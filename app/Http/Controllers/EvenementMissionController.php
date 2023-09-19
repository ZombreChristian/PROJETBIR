<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\EvenementMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EvenementMissionController extends Controller
{
    public function AllEvenementMission(){
        $evenementMissions = EvenementMission::all();
        return view('backend.pages.evenementMission.all_evenementMission',compact('evenementMissions'));
    }
      
     public function StoreEvenementMission(Request $request){
      $request->validate([
        
        'NomEvenement'=>'required|unique:evenement_missions|max:200',
        'dateDebut'=>'required',
        'dateFin'=>'required',
        'observation'=>'required',
        'retex'=>'required'
      ]);
      EvenementMission::insert([
        
          'NomEvenement'=> $request->NomEvenement,
          'dateFin'=> $request->dateFin,
          'dateDebut'=> $request->dateDebut,
          'observation'=> $request->observation,
          'retex'=> $request->retex,
      ]);
     $notification= array(
         'message'=> 'Nouveau Evenement Mission a ete creer avec Success',
         'alert-type'=> 'success'
        );
        return redirect()->route('all.evenementMission')->with($notification);
        
  }
    
  // public function EditType($id){
  //     $types = PropertyType::findOrFail($id);
  //     return view('backend.type.edit_type',compact('types'));
  // }
    
  public function UpdateEvenementMission(Request $request){
    $pid= $request->id;
    EvenementMission::findOrFail($pid)->update([
          'NomEvenement'=> $request->NomEvenement,
          'dateFin'=> $request->dateFin,
          'dateDebut'=> $request->dateDebut,
          'observation'=> $request->observation,
          'retex'=> $request->retex,
      ]);
      $notification= array(
          'message'=> 'Mise à jour evenement mission reussie',
          'alert-type'=> 'success'
         );
         return redirect()->route('all.evenementMission')->with($notification);
        
 }
 public function DeleteEvenementMission($id){
     EvenementMission::findOrFail($id)->delete();
     $notification= array(
         'message'=> 'Evenement Mission a ete supprimer avec success',
         'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
  }
    

}