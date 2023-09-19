<?php

namespace App\Http\Controllers\Dotation;
use App\Models\Arme;
use App\Models\Munition;
use App\Models\Personnel;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DotationController extends Controller
{
    public function AllDotation(){

        $armes = Arme::all();
        $personnels = Personnel::all();

        $munitions = Munition::all();
        // $motos = Moto::all();
        // $vehicules = Vehicule::all();


        return view('backend.dotation.all_dotations', compact('armes', 'munitions','personnels'));

     }

}
