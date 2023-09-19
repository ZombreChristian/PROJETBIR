<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Indisponibilite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndisponibiliteController extends Controller


{
    public function AllIndisponibilite(){
        $indisponibilites = Indisponibilite::latest()->get();
        return view('backend.pages.indisponibilite.all_indisponibilite',compact('indisponibilites'));
    }
        

    public function StoreIndisponibilite(Request $request){
        $request->validate([
          
           
            'dateDebut'=>'required',
            'dateFin'=>'required'
            
        ]);
        Indisponibilite::insert([
           
            'dateDebut'=> $request->dateDebut,
            'dateFin'=> $request->dateFin
        ]);
       $notification= array(
           'message'=> 'Nouvelle Categorie a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.indisponibilite')->with($notification);
        
    }
    
//    public function EditCategorie($id){
//        $categories =Categorie::findOrFail($id);
//        return view('backend.Cta.edit_type',compact('types'));
//    }
    
   public function UpdateIndisponibilite(Request $request){
     $pid= $request->id;
     Indisponibilite::findOrFail($pid)->update([
       
        'dateDebut'=> $request->dateDebut,
        'dateFin'=> $request->dateFin
      ]);
       $notification= array(
           'message'=> 'mise à jour de catégorie réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.indisponibilite')->with($notification);
        
    }
 public function DeleteIndisponibilite($id){
    Indisponibilite::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'Indisponibilite supprimer avec success',
         'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}