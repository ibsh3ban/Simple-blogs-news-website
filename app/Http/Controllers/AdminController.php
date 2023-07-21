<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'You Are Loged Out !',
            'alert-type' => 'info',

        );


        return redirect('/login')->with($notification);
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function editprofile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }


    public function storeprofile(Request $request)
    {
            $id= Auth::user()->id;
            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;


                if (request()->hasFile('profile_image')) {

                    $image = $request->file('profile_image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('upload/admin_images', $imageName);

                    $data['profile_image'] = $imageName;
                    }

                $data->save();

                $notification = array(
                    'message' => 'Profile Updated Succsesfully !',
                    'alert-type' => 'success',

                );
                return redirect()->route('admin.profile')->with($notification);
    }
    public function changepassword()
    {

        return view('admin.admin_password_change');
    }



    public function updatepassword(Request $request)
    {
    $validateData = $request->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirmpassword' => 'required|same:newpassword',
    ]);
    $hashedPassword = Auth::user()->password;
    if(Hash::check($request->oldpassword, $hashedPassword)){
     $user = User::find(Auth::id());
     $user->password = bcrypt($request->newpassword);
     $user->save();

     $notification = array(
        'message' => 'Password Updated Succsesfully !',
        'alert-type' => 'success',

    );
    return redirect()->route('admin.profile')->with($notification);
    } else{
        $notification = array(
            'message' => 'Old Password Not Mach !',
            'alert-type' => 'error',

        );
        return redirect()->back()->with($notification);

    }






    }
}
