<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function index() {
        return view('pages.login');
    }

    function LoginController(Request $req) {

        $req->validate([
            'userType' =>'required',
            'email' =>'required|email',
            'password' => 'required',
        ]);

        $credentials = $req->only('email', 'password');
        $userType = $req->userType;
        
        if (Auth::guard($userType)->attempt($credentials)) {
            Session::put('user',[
                    'userStatus' => true,
                    'userType' => $userType,
                    'email' => $req->email
                ]);

            if ($userType == 'admin') {
                return redirect()->intended(route('adminDashboard'));
            }
            if ($userType == "mentor") {
                return redirect()->intended(route('mentorDashboard.home'));
            }
            else if ($userType == "mentee") {
                return redirect()->intended(route('menteeDashboard'));
            }
        }
    
        return redirect()->route('loginUser')->with([
            'errorLogin' => 'Invalid credentials (email or password) does not match.',
        ]);
    }

    function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->route('loginUser');
    }
}
