<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Compagnie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompagnieController extends Controller
{
    public function AllCompagnie(){
        $compagnies = Compagnie::all();
        return view('backend.pages.compagnie.all_compagnie',compact('compagnies'));
    }


    public function StoreCompagnie(Request $request){
        $request->validate([
           
            'nomCompagnie'=>'required|unique:compagnies|max:200',
           
        ]);
        Compagnie::insert([
            
            'nomCompagnie'=> $request->nomCompagnie,
            
        ]);
       $notification= array(
           'message'=> 'Nouvelle Compagnie a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.compagnie')->with($notification);
        
    }
    
    //     public function EditType($id){
    //     $types = PropertyType::findOrFail($id);
    //     return view('backend.type.edit_type',compact('types'));
  //  }
    
    public function UpdateCompagnie(Request $request){
      $pid= $request->id;
       Compagnie::findOrFail($pid)->update([
           'nomCompagnie'=>$request->nomCompagnie,
           
        ]);
        $notification= array(
            'message'=> 'Mise a jour Compagnie reussie',
            'alert-type'=> 'success'
           );
           return redirect()->route('all.compagnie')->with($notification);
        
    }
 public function DeleteCompagnie($id){
    Compagnie::findOrFail($id)->delete();
       $notification= array(
           'message'=> 'Compagnie supprimer avec success',
        'alert-type'=> 'success'
          );
       return redirect()->back()->with($notification);
     }
   

}
        