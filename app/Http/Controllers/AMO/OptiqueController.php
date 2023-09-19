<?php

namespace App\Http\Controllers\AMO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Optique;


class OptiqueController extends Controller
{
    public function AllOptique(){
       $optiques = Optique::latest()->get();
       return view('backend.optique.all_optiques',compact('optiques'));
    }

    public function AddOptique(){
        return view('backend.optique.add_optiques');
     }

    public function StoreOptique(Request $request){
        // Validation
        $request->validate ([
            'noSerieOpt'=>'required|unique:Optiques|max:200',
            'nom'=>'required|unique:Optiques|',
            'type'=>'required|',
            'date'=>'required|',



        ]);

        Optique:: insert([
            'noSerieOpt'=> $request->noSerieOpt,
            'nom'=> $request->nom,
            'type'=> $request->type,
            'date'=> $request->date,
            // 'imageUrl'=> $request->imageUrl,

        ]);

        $notification = array(
            'message' => ' Optique a été créé avec succès',
            'alert-type' => 'success'
        );


        return redirect()->route('all.optique')->with($notification);


    }

    public function EditOptique($id){
        $optiques = Optique::findOrFail($id);
        return view('backend.optique.edit_optiques',compact('optiques'));
     }



    public function UpdateOptique(Request $request){

        $pid =$request->id;

        $request->validate ([
            'noSerieOpt'=>'required|unique:Optiques|max:200',
            'nom'=>'required|unique:Optiques|',
            'type'=>'required|',
            'date'=>'required|',
        ]);


        Optique:: findOrFail($pid)->update([
            'noSerieOpt'=> $request->noSerieOpt,
            'nom'=> $request->nom,
            'type'=> $request->type,
            'date'=> $request->date,
            // 'imageUrl'=> $request->imageUrl,

        ]);

        $notification = array(
            'message' => ' Optique a été modifier avec succès',
            'alert-type' => 'success'
        );


        return redirect()->route('all.optique')->with($notification);


    }


    public function DeleteOptique($id){

        Optique:: findOrFail($id)->delete();


        $notification = array(
            'message' => ' Optique a été supprimé avec succès',
            'alert-type' => 'success'
        );


        // return redirect()->route('all.Optique')->with($notification);
        return redirect()->route('all.optique')->with($notification);

    }

    /// Amenitie










}
