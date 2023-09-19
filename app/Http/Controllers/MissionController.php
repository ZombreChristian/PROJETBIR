<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MissionController extends Controller
{
    public function AllMission(){
        $missions = Mission::latest()->get();
        return view('backend.pages.mission.all_mission',compact('missions'));
    }
      public function AddMission(){
        
          return view('backend.pages.mission.add_mission');
      }
     public function StoreMission(Request $request){
      $request->validate([
        
        'libelle'=>'required|unique:missions|max:200',
        'numeroOM'=>'required',
        'dateDebut'=>'required',
        'dateFin'=>'required',
        'observation'=>'required',
        'retex'=>'required'
      ]);
      Mission::insert([
        
          'libelle'=> $request->libelle,
          'numeroOM'=> $request->numeroOM,
          'dateFin'=> $request->dateFin,
          'dateDebut'=> $request->dateDebut,
          'observation'=> $request->observation,
          'retex'=> $request->retex,
      ]);
     $notification= array(
         'message'=> 'Nouveau Mission a ete creer avec Success',
         'alert-type'=> 'success'
        );
        return redirect()->route('all.mission')->with($notification);
        
  }
    
  // public function EditType($id){
  //     $types = PropertyType::findOrFail($id);
  //     return view('backend.type.edit_type',compact('types'));
  // }
    
 public function UpdateMission(Request $request){
    $pid= $request->id;
      Mission::findOrFail($pid)->update([
       
        'libelle'=> $request->libelle,
        'numeroOM'=> $request->numeroOM,
        'dateFin'=> $request->dateFin,
        'dateDebut'=> $request->dateDebut,
        'observation'=> $request->observation,
        'retex'=> $request->retex,
      ]);
      $notification= array(
          'message'=> 'Mise à jour Mission reussie',
          'alert-type'=> 'success'
         );
         return redirect()->route('all.mission')->with($notification);
        
  }
 public function DeleteMission($id){
     Mission::findOrFail($id)->delete();
     $notification= array(
         'message'=> 'Mission a ete supprimer avec success',
         'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);
  }
    

}