<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Groupe;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GroupeController extends Controller
{
    public function AllGroupe(){
        $groupes = Groupe::with('sections')->get();
        $sections = Section::all();
        return view('backend.pages.groupe.all_groupe',compact('groupes','sections'));
    }
  
   public function StoreGroupe(Request $request){
       $request->validate([
         
           'nomGroupe'=>'required|unique:groupes|max:200',
           
       ]);
       Groupe::insert([
           
           'nomGroupe'=> $request->nomGroupe,
           
       ]);
      $notification= array(
          'message'=> 'Nouveau Groupe a ete creer avec Success',
          'alert-type'=> 'success'
         );
         return redirect()->route('all.groupe')->with($notification);
        
   }
    
    //  public function EditType($id){
    //    $types = PropertyType::findOrFail($id);
    //    return view('backend.type.edit_type',compact('types'));
    //   }
    
     public function UpdateGroupe(Request $request){
     $pid= $request->id;
     Groupe::findOrFail($pid)->update([
        
        'nomGroupe'=> $request->nomGroupe,
      
       ]);
       $notification= array(
           'message'=> 'Mise à jour Groupe reussie',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.groupe')->with($notification);
        
     }
     public function DeleteGroupe($id){
      Groupe::findOrFail($id)->delete();
      $notification= array(
          'message'=> 'Groupe a ete enregistrer avec success',
          'alert-type'=> 'success'
         );
         return redirect()->back()->with($notification);
   }
    

}