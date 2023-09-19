<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StageController extends Controller
{

    public function AllStage(){
        $stages = Stage::all();
        return view('backend.pages.stage.all_stage',compact('stages'));
    }
        

    public function StoreStage(Request $request){
        $request->validate([   
            'nomStage'=>'required',
            'pays'=>'required',
            'description'=>'required'
        ]);
        Stage::insert([
            
            'nomStage'=>$request->nomStage,
            'pays'=> $request->pays,
            'description'=>$request->description,
            
        ]);
       $notification= array(
           'message'=> 'Nouvelle Stage a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.stage')->with($notification);
        
    }
    
   public function UpdateStage(Request $request){
     $pid= $request->id;
     Stage::findOrFail($pid)->update([
        'nomStage'=>$request->nomStage,
        'pays'=> $request->pays,
        'description'=>$request->description,
      ]);
       $notification= array(
           'message'=> 'mise à jour de Stage réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.stage')->with($notification);
        
    }
 public function DeleteStage($id){
    Stage::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'Stage supprimer avec success',
            'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}