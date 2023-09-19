<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Malade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class MaladeController extends Controller
{
  //
    public function AllMalade(){
        $malades = Malade::latest()->get();
        return view('backend.pages.malade.all_malade',compact('malades'));
    }
        

    public function StoreMalade(Request $request){
        $request->validate([
          
            
            'libelle'=>'required'
        ]);
        Malade::insert([
           
            'libelle'=> $request->libelle,
        ]);
       $notification= array(
           'message'=> 'Nouvelle Malade a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.malade')->with($notification);
        
    }
    

    
   public function UpdateMalade(Request $request){
     $pid= $request->id;
     Malade::findOrFail($pid)->update([
    
        'libelle'=> $request->libelle,
      ]);
       $notification= array(
           'message'=> 'mise à jour de malade réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.malade')->with($notification);
        
    }
 public function DeleteMalade($id){
    Malade::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'Malade supprimer avec success',
            'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    

}