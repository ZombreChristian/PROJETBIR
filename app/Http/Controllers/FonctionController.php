<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FonctionController extends Controller
{
    //

    public function AllFonction(){
        $fonctions =Fonction::all();
        return view('backend.pages.fonction.all_fonction',compact('fonctions'));
    }
        

    public function StoreFonction(Request $request){
        $request->validate([
          
           
            'libelle'=>'required',
            'dateNomination'=>'required',
            'numeroNoteServiceNomination'=>'required'
            
        ]);
        Fonction::insert([
          
            
            'libelle'=> $request->libelle,
            'dateNomination'=> $request->dateNomination,
            'numeroNoteServiceNomination'=> $request->numeroNoteServiceNomination, 
        ]);
       $notification= array(
           'message'=> 'Nouvelle fonction a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.fonction')->with($notification);
        
    }
    
//    public function EditCategorie($id){
//        $categories =Categorie::findOrFail($id);
//        return view('backend.Cta.edit_type',compact('types'));
//    }
    
   public function UpdateFonction(Request $request){
     $pid= $request->id;
     Fonction::findOrFail($pid)->update([
      
        
        'libelle'=> $request->libelle,
        'dateNomination'=> $request->dateNomination,
        'numeroNoteServiceNomination'=> $request->numeroNoteServiceNomination, 
      ]);
       $notification= array(
           'message'=> 'mise à jour de fonctionréussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.fonction')->with($notification);
        
    }
 public function DeleteFonction($id){
    Fonction::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'Fonction supprimer avec success',
         'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}