<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin_profile_view',compact('profileData'));
    }

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;


        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo']= $filename;

        }
        $data->save();
        $notification = array(
            'message' => 'Admin profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }




    public function AdminUpdatePassword(Request $request){
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
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }

    // admin user All route
    public function AllAdmin(){
        $roles = Role::all();
        // $users = User::all();
        $alladmin = User::with('role')->get();


        return view('backend.pages.admin.all_admin',compact('alladmin','roles'));



    }

    public function AddAdmin(){
        $roles = Role::all();
        return view('backend.pages.admin.add_admin',compact('roles'));
    }


    public function StoreAdmin(Request $request){
        $user = new User();

        $user-> username = $request->username;
        $user-> name = $request->name;

        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user-> password = Hash::make($request->password);
        $user->role_id = $request->roles;
        $user-> status = 'active';
        $user->save();

        DB::table('model_has_roles')->insert([
            'role_id' =>$user->role_id  ,
            'model_type'=>'App\Models\User',
            'model_id' =>$user->id
        ]);

        if ($request->roles) {
            $role = Role::where('name', $request->roles)->first();
            if ($role) {
                $user->role_id()->associate($role); // Associe le rôle à l'utilisateur
                $user->save(); // Sauvegarde les modifications
            }
    }


        // if($request->roles){
        //     $user->assignRole($request->roles);
        // }

        $notification = array(
            'message' => 'New Admin user inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }



        public function EditAdmin($id){
            $user = User::findOrFail($id);
            $roles = Role::all();

            return view('backend.pages.admin.edit_admin',compact('user','roles'));

        }


        public function UpdateAdmin(Request $request,$id){
            $user = User::findOrFail($id);

            $user-> username = $request->username;
            $user-> name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->role_id = $request->roles;
            $user-> status = 'active';
            $user->save();

            // $user->roles()->detach();
            // if($request->roles){
            //     $user->assignRole($request->roles);
            // }

            $notification = array(
                'message' => 'New Admin user update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.admin')->with($notification);
        }

        public function DeleteAdmin($id){
            $user = User::findOrFail($id);
            if(!is_null($user)){
                $user->delete();
            }

            $notification = array(
                'message' => 'New Admin user delete Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.admin')->with($notification);
        }








}
