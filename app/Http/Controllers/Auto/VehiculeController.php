<?php

namespace App\Http\Controllers\Auto;
use App\Models\Vehicule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function AllVehicule(){

        $vehicules = Vehicule::latest()->get();
        return view('backend.vehicule.all_vehicules',compact('vehicules'));
     }

     public function AddVehicule(){
        return view('backend.vehicule.add_vehicules');
     }

     public function StoreVehicule(Request $request){
        // Validation
        $request->validate ([
            'noSerieVeh'=>'required|unique:vehicules|max:200',
            'nom'=>'required|unique:vehicules|',
            'type'=>'required|',
            'marque'=>'required|',
           
        ]);

        Vehicule:: insert([
            'noSerieVeh'=> $request->noSerieVeh,
            'nom'=> $request->nom,
            'type'=> $request->type,
            'marque'=> $request->marque,

        ]);

        $notification = array(
            'message' => 'vehicule a été créé avec succès',
            'alert-type' => 'success'
        );


        return redirect()->route('all.vehicule')->with($notification);


    }

    public function Editvehicule($id){
        $vehicules = Vehicule::findOrFail($id);
        return view('backend.vehicule.edit_vehicules',compact('vehicules'));
     }

     public function Updatevehicule(Request $request){

        $pid =$request->id;

        $request->validate ([
            'noSerieVeh'=>'required|unique:vehicules|max:200',
            'nom'=>'required|unique:vehicules|',
            'type'=>'required|',
            'marque'=>'required|',

        ]);


        Vehicule:: findOrFail($pid)->update([
            'noSerieVeh'=> $request->noSerieVeh,
            'nom'=> $request->nom,
            'type'=> $request->type,
            'marque'=> $request->marque,
        ]);

        $notification = array(
            'message' => 'vehicule a modifié avec succès',
            'alert-type' => 'success'
        );


        // return redirect()->route('all.Arme')->with($notification);
        return redirect()->route('all.vehicule')->with($notification);


    }

    public function Deletevehicule($id){

        Vehicule:: findOrFail($id)->delete();


        $notification = array(
            'message' => 'vehicule supprimé avec succès',
            'alert-type' => 'success'
        );


        // return redirect()->route('all.Arme')->with($notification);
        return redirect()->route('all.vehicule')->with($notification);

    }


}
