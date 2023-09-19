<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\MoyenMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MoyenMissionController extends Controller
{
    public function AllMoyenMission(){
        $moyenMissions = MoyenMission::latest()->get();
        return view('backend.pages.moyenMission.all_moyenMission',compact('moyenMissions'));
    }
     public function AddMission(){
        
         return view('backend.pages.mission.add_mission');
     }
     public function StoreMoyenMission(Request $request){
      $request->validate([
       
        'nomMoyens'=>'required|unique:moyen_missions|max:200',
        'nombre'=>'required',
        'observation'=>'required',
       
      ]);
      MoyenMission::insert([
          'nomMoyens'=>$request->nomMoyens,
          'nombre'=> $request->nombre,
          'observation'=> $request->observation,
         
      ]);
     $notification= array(
         'message'=> 'Nouveau Mission a ete creer avec Success',
         'alert-type'=> 'success'
        );
        return redirect()->route('all.moyenMission')->with($notification);
        
  }
    
//  public function EditType($id){
//      $types = PropertyType::findOrFail($id);
//      return view('backend.type.edit_type',compact('types'));
//  }
    
 public function UpdateMoyenMission(Request $request){
   $pid= $request->id;
   MoyenMission::findOrFail($pid)->update([
    'nomMoyens'=>$request->nomMoyens,
    'nombre'=> $request->nombre,
    'observation'=> $request->observatio
     ]);
     $notification= array(
         'message'=> 'Mise à jour moyen mission reussie',
         'alert-type'=> 'success'
        );
        return redirect()->route('all.moyenMission')->with($notification);
        
 }
 public function DeleteMoyenMission($id){
    MoyenMission::findOrFail($id)->delete();
     $notification= array(
         'message'=> 'Mission a ete supprimer avec success',
         'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
  }
    

}