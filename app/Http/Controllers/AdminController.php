<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    
     /**
     * Display the login view.
     */
    public function create(): View
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
}
