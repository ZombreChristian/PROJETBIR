<?php

namespace App\Http\Controllers\Permanence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\permanence\Postegardes;

class PostegardeController extends Controller
{
    public function AllPoste(){
        $postegardes = Postegardes::all();
        return view('permanencier.poste.poste_garde',compact('postegardes'));
    }

    public function StorePoste(Request $request){
        
        $request->validate([
            'poste_nom' => 'required',
            'poste_lieu' => 'required',
        ]);

        Postegardes::create([
            'poste_nom' => $request->poste_nom,
            'poste_lieu' => $request->poste_lieu, 

        ]);

        $notification = array(
            'message' => 'poste de garde crée avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
}//end method

    public function DeletePoste($id){

        Postegardes::findOrFail($id)->delete();


        $notification = array(
            'message' => 'poste de garde supprimé avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function UpdatePoste(Request $request){
        $pid =$request->id;
        // Validation
        $request->validate ([
            'poste_nom' => 'required',
            'poste_lieu' => 'required',

        ]);

        Postegardes:: findOrFail($pid)->update([
            'poste_nom'=> $request->poste_nom,
            'poste_lieu'=> $request->poste_lieu,
        ]);

        $notification = array(
            'message' => 'Poste de garde modifié avec succès',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
