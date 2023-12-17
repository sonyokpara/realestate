<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('auth.login');
    }

     /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request){
        $request->authenticate();

        $request->session()->regenerate();

        $url = 'admin/dashboard';

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
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

    public function changePassword(){
        $user = User::find(Auth::user()->id);
        return view('admin.password-form', compact('user'));
    }
}
