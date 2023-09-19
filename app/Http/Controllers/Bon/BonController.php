<?php

namespace App\Http\Controllers\Bon;
use App\Models\Arme;
use App\Models\Munition;
use App\Models\Vehicule;
use App\Models\Optique;
use App\Models\Moto;
use App\Models\Personnel;
use App\Models\Bon;
use PDF;





use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BonController extends Controller
{
    public function AllBon(){

        $personnels = Personnel::all();
        $bons = Bon::all();
        $armes = Arme::all();
        $munitions = Munition::all();
        $optiques = Optique::all();
        // $motos = Moto::all();
        // $vehicules = Vehicule::all();


        return view('backend.bon.all_bons', compact('personnels', 'armes', 'munitions', 'optiques','bons'));

     }


     public function StoreBon(Request $request)
{
    // Validez les données du formulaire ici
    $data = $request->validate([
        'personnel' => 'required|exists:personnels,id',
        'armes' => 'array',
        'munitions' => 'array',
        'optiques' => 'array',
    ]);

    // Créez un nouveau bon
    $bon = new Bon([
        'personnel_id' => $data['personnel'],
        'date'=> $request->date,
        'type_bon'=> $request->type_bon,
    ]);
    $bon->save();

    // Attachez les armes, munitions et optiques sélectionnées au bon
    $bon->armes()->attach($data['armes']);
    $bon->munitions()->attach($data['munitions']);
    $bon->optiques()->attach($data['optiques']);



    $notification = array(
        'message' => ' Bon a été créé avec succès',
        'alert-type' => 'success'
    );


    return redirect()->route('all.bon')->with($notification);

}

public function updateBon(Request $request, $id)
{
    // Validez les données du formulaire ici
    $data = $request->validate([
        'personnel' => 'required|exists:personnels,id',
        'armes' => 'array',
        'munitions' => 'array',
        'optiques' => 'array',
        // 'quantite' => 'numeric', // Ajoutez une règle de validation pour la quantité

    ]);

    // Récupérez la quantité du formulaire
    // $quantite = $request->input('quantite');

    // Trouvez le bon de mission que vous souhaitez mettre à jour
    $bon = Bon::findOrFail($id);

    // Mettez à jour les attributs du bon de mission
    $bon->personnel_id = $data['personnel'];

    $bon->type_bon =$request->type_bon;
    $bon->date =$request->date;


    // Autres attributs à mettre à jour si nécessaire

    // Enregistrez les modifications
    $bon->save();

    // Mettez à jour les relations (armes, munitions, optiques) du bon de mission
    $bon->armes()->sync($data['armes']);
    $bon->munitions()->sync($data['munitions']);
    $bon->optiques()->sync($data['optiques']);

    $notification = array(
        'message' => 'Bon a été mis à jour avec succès',
        'alert-type' => 'success'
    );

    return redirect()->route('all.bon')->with($notification);
}


public function DeleteBon($id){

    Bon:: findOrFail($id)->delete();


    $notification = array(
        'message' => ' Bon a été supprimé avec succès',
        'alert-type' => 'success'
    );


    // return redirect()->route('all.Arme')->with($notification);
    return redirect()->route('all.bon')->with($notification);

}

public function telechargerPdf($id)
{
    // Récupérez le "bon" par ID (vous devrez peut-être ajuster le modèle)
    $bon = Bon::findOrFail($id);

    // Générez le contenu PDF en utilisant Laravel PDF
    $pdf = PDF::loadView('bon_form', compact('bon'));

    // Définissez le nom du fichier PDF (vous pouvez personnaliser ceci)
    $pdfFileName = 'bon_' . $bon->id . '.pdf';

    // Retournez le PDF en tant que réponse de téléchargement
    return $pdf->download($pdfFileName);
}


}
