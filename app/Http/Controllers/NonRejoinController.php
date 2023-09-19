<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\NonRejoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NonRejoinController extends Controller
{
    //
  //

   //
    public function AllNonRejoin(){
        $nonRejoins = NonRejoin::latest()->get();
        return view('backend.pages.nonRejoin.all_nonRejoin',compact('nonRejoins'));
    }
        

    public function StoreNonRejoin(Request $request){
        $request->validate([
          
            
            'libelle'=>'required',
            'motif'=>'required'
        ]);
        NonRejoin::insert([
          
           
            'libelle'=> $request->libelle,
            'motif'=>$request->motif
        ]);
       $notification= array(
           'message'=> 'Nouvelle NonRejoins a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.nonRejoin')->with($notification);
        
    }
    
//    public function EditCategorie($id){
//        $categories =Categorie::findOrFail($id);
//        return view('backend.Cta.edit_type',compact('types'));
//    }
    
   public function UpdateNonRejoin(Request $request){
     $pid= $request->id;
     NonRejoin::findOrFail($pid)->update([
        'codeNonRejoin'=> $request->codeNonRejoin,
        'libelle'=> $request->libelle,
        'motif'=>$request->motif
      ]);
       $notification= array(
           'message'=> 'mise à jour de NonRejoin réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.NonRejoin')->with($notification);
        
    }
 public function DeleteNonRejoin($id){
    NonRejoin::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'NonRejoins supprimer avec success',
            'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}