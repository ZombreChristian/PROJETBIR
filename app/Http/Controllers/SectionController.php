<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use App\Models\Compagnie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SectionController extends Controller
{
    public function AllSection(){
        $sections = Section::latest()->get();
        $compagnies = Compagnie::all();
        return view('backend.pages.section.all_section',compact('sections','compagnies'));
    }
   public function AddSection(){
       return view('backend.pages.section.add_section');
   }
      public function StoreSection(Request $request){
    
        
        $request->validate([
            'nomSection' => 'required|string|max:255',
           
        ]);
    
        Section::create([
            'nomSection' => $request->input('nomSection'),
           
        ]);
         $notification= array(
             'message'=> 'NouveauSection a ete creer avec Success',
             'alert-'=> 'success'
            );
            return redirect()->route('all.section')->with($notification);
        
      }
    
//   public function Edit($id){
//       $s = Property::findOrFail($id);
//       return view('backend..edit_',compact('s'));
//   }
    
  public function UpdateSection(Request $request){
    $pid= $request->id;
      Section::findOrFail($pid)->update([
        'nomSection'=> $request->nomSection,
      ]);
      $notification= array(
          'message'=> 'Mise à jour section reussie',
          'alert-'=> 'success'
         );
         return redirect()->route('all.section')->with($notification);
        
  }
     public function DeleteSection($id){
       Section::findOrFail($id)->delete();
         $notification= array(
             'message'=> 'Property  Delete Succesfully',
             'alert-'=> 'success'
            );
            return redirect()->back()->with($notification);
      }
    

}