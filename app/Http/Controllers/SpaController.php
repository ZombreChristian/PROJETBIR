<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Spa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SpaController extends Controller
{

    public function AllSpa(){
        $spas = Spa::latest()->get();
        return view('backend.pages.spa.all_spa',compact('spas'));
    }
        

    public function StoreSpa(Request $request){
        $request->validate([
          
            
            'date'=>'required',
            'effectifOfficier'=>'required',
            'effectifSousOfficier'=>'required',
            'effectifMilitaireRang'=>'required'
        ]);
        Spa::insert([
            
           
            'date'=> $request->date,
            'effectifOfficier'=>$request->effectifOfficier,
            'effectifSousOfficier'=>$request->effectifSousOfficier,
            'effectifMilitaireRang'=>$request->effectifMilitaireRang,
        ]);
       $notification= array(
           'message'=> 'Nouvelle Spa a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.spa')->with($notification);
        
    }
    
//    public function EditCategorie($id){
//        $categories =Categorie::findOrFail($id);
//        return view('backend.Cta.edit_type',compact('types'));
//    }
    
   public function UpdateSpa(Request $request){
     $pid= $request->id;
     Spa::findOrFail($pid)->update([
          
          'date'=> $request->date,
          'effectifOfficier'=>$request->effectifOfficier,
          'effectifSousOfficier'=>$request->effectifSousOfficier,
          'effectifMilitaireRang'=>$request->effectifMilitaireRang,
      ]);
       $notification= array(
           'message'=> 'mise à jour de Spa réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.spa')->with($notification);
        
    }
 public function DeleteSpa($id){
    Spa::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'Spa supprimer avec success',
            'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}