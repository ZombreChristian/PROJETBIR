<?php

namespace App\Http\Controllers\AMO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arme;
use App\Models\TypeArme;
use Illuminate\Validation\Rule;
use PDF;



class ArmeController extends Controller

{


    public function AllArme(){
       $armes = Arme::latest()->get();
       $types_armes = TypeArme:: all();
       return view('backend.arme.all_armes',compact('armes','types_armes'));
    }

    public function ListeArme(){
        $armes = Arme::latest()->get();

        return view('backend.arme.add_armes',compact('armes'));
     }

    public function StoreArme(Request $request){
        // Validation
        $request->validate ([
            'noSerieArme'=>'required|unique:armes|max:200',
            'nom'=>'required|',
            'marque'=>'required|',
            'type'=>'required|',
            'date'=>'required|',
            'quantite'=>'required|',
            'etat'=>'required|',
            'provenance'=>'required|',


        ]);

        Arme:: insert([
            'noSerieArme'=> $request->noSerieArme,
            'nom'=> $request->nom,
            'marque'=> $request->marque,
            'type'=> $request->type,
            'quantite'=> $request->quantite,
            'date'=> $request->date,
            'etat'=> $request->etat,
            'provenance'=> $request->provenance,
            // 'imageUrl'=> $request->imageUrl,

        ]);

        $notification = array(
            'message' => ' Arme a été créé avec succès',
            'alert-type' => 'success'
        );


        return redirect()->route('all.arme')->with($notification);


    }

    public function EditArme($id){
        $armes = Arme::findOrFail($id);
        return view('backend.arme.edit_armes',compact('armes'));
     }



    public function UpdateArme(Request $request){

        $pid =$request->id;

        $request->validate ([
            // 'noSerieArme'=>'required|unique:armes,noSerieArme|max:200' .$pid,
            'noSerieArme' => [
                'required',
                Rule::unique('armes')->ignore($pid), // Ignorer l'ID actuel lors de la validation unique
                'max:200',
            ],
            'nom'=>'required|',
            'marque'=>'required|',
            'type'=>'required|',
            'quantite'=>'required|',
            'date'=>'required|',
            'etat'=>'required|',
            'provenance'=>'required|',

        ]);


        Arme::findOrFail($pid)->update([
            'noSerieArme'=> $request->noSerieArme,
            'nom'=> $request->nom,
            'marque'=> $request->marque,
            'type'=> $request->type,
            'quantite'=> $request->quantite,
            'date'=> $request->date,
            'etat'=> $request->etat,
            'provenance'=> $request->provenance,

        ]);

        $notification = array(
            'message' => ' Arme a été modifier avec succès',
            'alert-type' => 'success'
        );


        return redirect()->route('all.arme')->with($notification);


    }


    public function DeleteArme($id){

        Arme:: findOrFail($id)->delete();


        $notification = array(
            'message' => ' Arme a été supprimé avec succès',
            'alert-type' => 'success'
        );


        // return redirect()->route('all.Arme')->with($notification);
        return redirect()->route('all.arme')->with($notification);

    }

    // ----------------------------------------------------------------------


    public function AllTypeArme(){
        $typearme = TypeArme::latest()->get();
        return view('backend.typearme.all_typearmes',compact('typearme'));
     }

    //  public function AddTypeArme(){
    //      return view('backend.arme.add_armes');
    //   }

     public function StoreTypeArme(Request $request){
         // Validation
         $request->validate ([
             'nom'=>'required|unique:type_armes|',

         ]);

         TypeArme:: insert([
             'nom'=> $request->nom,


         ]);

         $notification = array(
             'message' => 'Type Arme a été créé avec succès',
             'alert-type' => 'success'
         );


         return redirect()->route('all.typearme')->with($notification);


     }

    //  public function EditTypeArme($id){
    //      $armes = typeArme::findOrFail($id);
    //      return view('backend.arme.edit_armes',compact('armes'));
    //   }



     public function UpdateTypeArme(Request $request){

         $pid =$request->id;

         $request->validate ([
            'nom'=>'required|unique:type_armes|',

         ]);


         TypeArme:: findOrFail($pid)->update([
             'nom'=> $request->nom,

         ]);

         $notification = array(
             'message' => ' Arme a été modifier avec succès',
             'alert-type' => 'success'
         );


         return redirect()->route('all.typearme')->with($notification);


     }


     public function DeleteTypeArme($id){

         TypeArme:: findOrFail($id)->delete();


         $notification = array(
             'message' => 'Type Arme a été supprimé avec succès',
             'alert-type' => 'success'
         );
         return redirect()->route('all.typearme')->with($notification);

     }

     public function telechargerPdf(Request $request)
{
    // Récupérez le "bon" par ID (vous devrez peut-être ajuster le modèle)

    // Générez le contenu PDF en utilisant Laravel PDF
    $pdf = PDF::loadView('backend.arme.add_armes');

    // Définissez le nom du fichier PDF (vous pouvez personnaliser ceci)
    $pdfFileName = 'ListeArme.pdf';

    // Retournez le PDF en tant que réponse de téléchargement
    return $pdf->download($pdfFileName);
}











}
