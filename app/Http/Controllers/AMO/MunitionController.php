<?php

namespace App\Http\Controllers\AMO;
use App\Models\Munition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MunitionController extends Controller
{
    public function AllMunition(){

        $munitions = Munition::latest()->get();
        return view('backend.munition.all_munitions',compact('munitions'));
     }

     public function AddMunition(){
        return view('backend.munition.add_munitions');
     }

     public function StoreMunition(Request $request){
        // Validation
        $request->validate ([
            'noSerieMuni'=>'required|unique:munitions|max:200',
            'nom'=>'required|unique:munitions|',
            'type'=>'required|',
            'date'=>'required|',
            'quantite'=>'required|',

        ]);

        Munition:: insert([
            'noSerieMuni'=> $request->noSerieMuni,
            'nom'=> $request->nom,
            'type'=> $request->type,
            'date'=> $request->date,
            'quantite'=> $request->quantite,


        ]);

        $notification = array(
            'message' => 'Munition a été créé avec succès',
            'alert-type' => 'success'
        );


        return redirect()->route('all.munition')->with($notification);


    }

    public function EditMunition($id){
        $munitions = Munition::findOrFail($id);
        return view('backend.munition.edit_munitions',compact('munitions'));
     }

     public function UpdateMunition(Request $request){

        $pid =$request->id;

        $request->validate ([
            'noSerieMuni'=>'required|unique:munitions|max:200',
            'nom'=>'required|unique:munitions|',
            'type'=>'required|',
            'date'=>'required|',
            'quantite'=>'required|',

        ]);


        Munition:: findOrFail($pid)->update([
            'noSerieMuni'=> $request->noSerieMuni,
            'nom'=> $request->nom,
            'type'=> $request->type,
            'date'=> $request->date,
            'quantite'=> $request->quantite,

        ]);

        $notification = array(
            'message' => 'Munition modifié avec succès',
            'alert-type' => 'success'
        );


        // return redirect()->route('all.Arme')->with($notification);
        return redirect()->route('all.munition')->with($notification);


    }

    public function DeleteMunition($id){

        Munition:: findOrFail($id)->delete();


        $notification = array(
            'message' => 'munition supprimé avec succès',
            'alert-type' => 'success'
        );


        // return redirect()->route('all.Arme')->with($notification);
        return redirect()->route('all.munition')->with($notification);

    }

}
