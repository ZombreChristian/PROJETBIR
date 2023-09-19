<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Prison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PrisonController extends Controller
{
  
    public function AllPrison(){
        $prisons = Prison::latest()->get();
        return view('backend.pages.prison.all_prison',compact('prisons'));
    }
        

    public function StorePrison(Request $request){
        $request->validate([
          
            'libelle'=>'required',
            'motif'=>'required'
        ]);
        Prison::insert([
          
            'libelle'=> $request->libelle,
            'motif'=>$request->motif,
        ]);
       $notification= array(
           'message'=> 'Nouvelle Prison a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.prison')->with($notification);
        
    }
    
//    public function EditCategorie($id){
//        $categories =Categorie::findOrFail($id);
//        return view('backend.Cta.edit_type',compact('types'));
//    }
    
   public function UpdatePrison(Request $request){
     $pid= $request->id;
     Prison::findOrFail($pid)->update([
        'codePrison'=> $request->codePrison,
        'libelle'=> $request->libelle,
        'motif'=>$request->motif,
      ]);
       $notification= array(
           'message'=> 'mise à jour de Prison réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.prison')->with($notification);
        
    }
 public function DeletePrison($id){
    Prison::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'Prison supprimer avec success',
            'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}