<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\PermissionIndisponibilite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PermissionIndisponibiliteController extends Controller
{

    //
    public function AllPermissionIndisponibilite(){
        $permissionIndisponibilites = PermissionIndisponibilite::latest()->get();
        return view('backend.pages.permissionIndisponibilite.all_permissionIndisponibilite',compact('permissionIndisponibilites'));
    }
        

    public function StorePermissionIndisponibilite(Request $request){
        $request->validate([
          
           'libelle'=>'required',
            'personnePrevenir'=>'required',
            'motif'=>'required',
            'lieu'=>'required',
            'nbreJours'=>'required',
            'addressPermission'=>'required'
            
        ]);
        PermissionIndisponibilite::insert([
           'libelle'=> $request->libelle,
            'personnePrevenir'=>$request->personnePrevenir,
            'lieu'=>$request->lieu,
            'motif'=>$request->motif,         
            'nbreJours'=>$request->nbreJours,
            'addressPermission'=>$request->addressPermission,
            
        ]);
       $notification= array(
           'message'=> 'Nouvelle PermissionIndisponibilite a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.permissionIndisponibilite')->with($notification);
        
    }
    
//    public function EditCategorie($id){
//        $categories =Categorie::findOrFail($id);
//        return view('backend.Cta.edit_type',compact('types'));
//    }
    
   public function UpdatePermissionIndisponibilite(Request $request){
     $pid= $request->id;
     PermissionIndisponibilite::findOrFail($pid)->update([

        'libelle'=> $request->libelle,
        'personnePrevenir'=>$request->personnePrevenir,
        'lieu'=>$request->lieu,
        'motif'=>$request->motif,         
        'nbreJours'=>$request->nbreJours,
        'addressPermission'=>$request->addressPermission,
      ]);
       $notification= array(
           'message'=> 'mise à jour de PermissionIndisponibilite réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.permissionIndisponibilite')->with($notification);
        
    }
 public function DeletePermissionIndisponibilite($id){
    PermissionIndisponibilite::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'PermissionIndisponibilite supprimer avec success',
            'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}