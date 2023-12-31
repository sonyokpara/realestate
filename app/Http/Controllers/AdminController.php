<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    
     /**
     * Display the login view.
     */
    public function create()
    {
        return view('admin.login');
    }

     /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request){
        $request->authenticate();

        $request->session()->regenerate();

        $url = 'admin/dashboard';
        
        $notification = array(
            'message' => 'Log in successful!',
            'alert-type' => 'success'
        );

        return redirect()->intended($url)->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        $notification = array(
            'message' => 'Logout successful!',
            'alert-type' => 'success'
        );

        return redirect('/admin/login')->with($notification);
    }

    /**
     * Display admin profile page
     */
    public function profile(){
        $id = Auth::user()->id;
        $profile = User::find($id);
        
        return view('admin.profile', compact('profile'));
    }

    /**
     * Update Admin Profile
     */
    public function updateProfile(Request $request) {
        $id = Auth::user()->id;
        $user = User::find($id);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->phone = $request->phone;

        if($request->file('photo')){
            @unlink(public_path('assets/profile-photos/'.$user->photo));
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $file->move(public_path('assets/profile-photos/'), $filename);
            $user->photo = $filename;
        }

        $user->save();

        $notification = array(
            'message' => 'Profile successfully updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePasswordForm(){
        $user = User::find(Auth::user()->id);
        return view('admin.password-form', compact('user'));
    }

    public function changePassword(Request $request){
        
        // Validate incoming request
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){

            // Match the old password with submitted password
            $notification = array(
                'message' => 'Old password does not match!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password changed successful!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
