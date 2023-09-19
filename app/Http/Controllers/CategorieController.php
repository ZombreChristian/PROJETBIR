<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategorieController extends Controller
{
    public function AllCategorie(){
        $categories = Categorie::all();
        return view('backend.pages.categorie.all_categorie',compact('categories'));
    }
        

    public function StoreCategorie(Request $request){
        $request->validate([
          
            'nomCatg'=>'required|unique:categories|max:200',
            'intitulCatg'=>'required'
        ]);
        Categorie::insert([
            'codeCatg'=>$request->codeCatg,
            'nomCatg'=> $request->nomCatg,
            'intitulCatg'=> $request->intitulCatg,
        ]);
       $notification= array(
           'message'=> 'Nouvelle Categorie a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.categorie')->with($notification);
        
    }
    
//    public function EditCategorie($id){
//        $categories =Categorie::findOrFail($id);
//        return view('backend.Cta.edit_type',compact('types'));
//    }
    
   public function UpdateCategorie(Request $request){
     $pid= $request->id;
           Categorie::findOrFail($pid)->update([
          'nomCatg'=>$request->nomCatg,
          'intitulCatg'=> $request->intitulCatg,
      ]);
       $notification= array(
           'message'=> 'mise à jour de catégorie réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.categorie')->with($notification);
        
    }
 public function DeleteCategorie($id){
     Categorie::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'Categorie supprimer avec success',
         'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}