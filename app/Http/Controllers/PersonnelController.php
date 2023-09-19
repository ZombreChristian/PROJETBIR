<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Personnel;
use App\Models\Grade;
use App\Models\Fonction;
use App\Models\Spa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class PersonnelController extends Controller
{
    // public function PersonnelDashboard(){
    //     return view('Personnel.Personnel_dashboard');
    // }


    public function PersonnelDashboard(){
        return view('personnel.index');
    }

    public function PersonnelLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function PersonnelLogin(){
        return view('personnel.personnel_login');
    }

    public function PersonnelProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('personnel.personnel_profile_view',compact('profileData'));
    }

    public function PersonnelProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;


        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/personnel_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/personnel_images'),$filename);
            $data['photo']= $filename;

        }
        $data->save();
        $notification = array(
            'message' => 'Personnel profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }

    public function PersonnelChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('personnel.personnel_change_password',compact('profileData'));
    }




    public function PersonnelUpdatePassword(Request $request){
        // Validation
        $request->validate ([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',

        ]);
        // Match old password
        if(!Hash::check($request->old_password,auth::user()->password)){
            $notification = array(
                'message' => 'Old password does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }

                // Match old password
        User::whereId(auth()->user()->id)->update([
            'password'=> Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success '
        );

        return redirect()->back()->with($notification);


    }
    public function AllPersonnel(){
        $personnels =Personnel::with('fonctions','spas')->get();;
        $grades= Grade::all();
        $fonctions =Fonction::all();
        $spas =Spa::all();
        return view('backend.pages.personnel.all_personnel',compact('personnels','grades','fonctions','spas'));
    }
        

    public function StorePersonnel(Request $request){
        $request->validate([
          
            'matricule'=>'required',
            'nom'=>'required',
            'prenom'=>'required',
            'pseudo'=>'required',
            'dateNaiss'=>'required',
            'groupeSang'=>'required',
            'numeroTelephone'=>'required',
            'whatsappNumero'=>'required',
            'specialite'=>'required',
            'grade'=>'required',
            'status'=>'required',
        
        ]);
        Personnel::insert([
          
            'matricule'=> $request->matricule,
            'nom'=>$request->nom,
            'prenom'=> $request->prenom,
            'pseudo'=>$request->pseudo,
            'dateNaiss'=> $request->dateNaiss,
            'groupeSang'=>$request->groupeSang,
            'numeroTelephone'=> $request->numeroTelephone,
            'whatsappNumero'=>$request->whatsappNumero,
            'specialite'=> $request->specialite,
            'grade'=> $request->grade,
            'status'=> $request->status,
        ]);
       $notification= array(
           'message'=> 'Nouvelle personnel a ete creer avec Success',
           'alert-type'=> 'success'
          );
          return redirect()->route('all.personnel')->with($notification);
        
    }
    
//    public function EditCategorie($id){
//        $categories =Categorie::findOrFail($id);
//        return view('backend.Cta.edit_type',compact('types'));
//    }
    
   public function UpdatePersonnel(Request $request){
     $pid= $request->id;
     Personnel::findOrFail($pid)->update([
       
        'matricule'=> $request->matricule,
        'nom'=>$request->nom,
        'prenom'=> $request->prenom,
        'pseudo'=>$request->pseudo,
        'dateNaiss'=> $request->dateNaiss,
        'groupeSang'=>$request->groupeSang,
        'numeroTelephone'=> $request->numeroTelephone,
        'whatsappNumero'=>$request->whatsappNumero,
        'specialite'=> $request->specialite,
        'grade'=> $request->grade,
        'status'=> $request->status,
      ]);
       $notification= array(
           'message'=> 'mise à jour de personnel réussie',          
            'alert-type'=> 'success'
          );
          return redirect()->route('all.personnel')->with($notification);
        
    }
 public function DeletePersonnel($id){
    Personnel::findOrFail($id)->delete();
        $notification= array(
            'message'=> 'Personnel supprimer avec success',
            'alert-type'=> 'success'
           );
        return redirect()->back()->with($notification);
      }
    





}