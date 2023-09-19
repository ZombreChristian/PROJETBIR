<?php

namespace App\Http\Controllers\Auto;
use App\Models\Moto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    public function AllMoto(){

        $motos = Moto::latest()->get();
        return view('backend.moto.all_motos',compact('motos'));
     }

     public function AddMoto(){
        return view('backend.moto.add_motos');
     }

     public function StoreMoto(Request $request){
        // Validation
        $request->validate ([
            'noSerieMot'=>'required|unique:motos|max:200',
            'nom'=>'required|',


        ]);

        Moto:: insert([
            'noSerieMot'=> $request->noSerieMot,
            'nom'=> $request->nom,



        ]);

        $notification = array(
            'message' => 'Moto a été créé avec succès',
            'alert-type' => 'success'
        );


        return redirect()->route('all.moto')->with($notification);


    }

    public function EditMoto($id){
        $motos = Moto::findOrFail($id);
        return view('backend.moto.edit_motos',compact('motos'));
     }

     public function UpdateMoto(Request $request){

        $pid =$request->id;

        $request->validate ([
            'noSerieMot'=>'required|unique:motos|max:200',
            'nom'=>'required|',


        ]);


        Moto:: findOrFail($pid)->update([
            'noSerieMot'=> $request->noSerieMot,
            'nom'=> $request->nom,

        ]);

        $notification = array(
            'message' => 'Moto modifié avec succès',
            'alert-type' => 'success'
        );


        // return redirect()->route('all.Arme')->with($notification);
        return redirect()->route('all.moto')->with($notification);


    }

    public function DeleteMoto($id){

        Moto:: findOrFail($id)->delete();


        $notification = array(
            'message' => 'Moto supprimé avec succès',
            'alert-type' => 'success'
        );


        // return redirect()->route('all.Arme')->with($notification);
        return redirect()->route('all.moto')->with($notification);

    }

}
