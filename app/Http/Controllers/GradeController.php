<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class GradeController extends Controller
{
    public function AllGrade(){
        $grades = Grade::all();
        $categories= Categorie::all();
        return view('backend.pages.grade.all_grade',compact('grades','categories'));
    }

    public function StoreGrade(Request $request){
        $request->validate([
            'codeGrade'=>'required',
            'nameGrade'=>'required|unique:grades|max:200',
            'ageRetraite'=>'required',
            'categorie'=>'required'
        ]);
       Grade::insert([
        'codeGrade'=>$request->codeGrade,
            'nameGrade'=>$request->nameGrade,
            'ageRetraite'=> $request->ageRetraite,
            'categorie'=> $request->categorie
            
        ]);
       $notification= array(
           'message'=> 'Nouvelle Categorie a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.grade')->with($notification);
        
    }
    

   public function UpdateGrade(Request $request){
     $pid= $request->id;
       Grade::findOrFail($pid)->update([
        'nameGrade'=> $request->nameGrade,
        'ageRetraite'=> $request->ageRetraite,
       ]);
       $notification= array(
           'message'=> 'Mise à jour Grade reussie',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.grade')->with($notification);
        
   }
   public function DeleteGrade($id){
       Grade::findOrFail($id)->delete();
       $notification= array(
           'message'=> 'Grade a ete supprimer avec succes',
           'alert-type'=> 'success'
          );
          return redirect()->back()->with($notification);
    }
    

}