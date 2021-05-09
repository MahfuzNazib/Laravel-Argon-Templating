<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // Writing Code For Custom Login
    public function login_show(){
        if(auth('super_admin')->check() || auth('web')->check()){
            return view('backend.dashboard');
        }else{
            return view('auth.login');
        }
    }

    public function do_login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        $superadmin = SuperAdmin::where('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();
        
        if($superadmin){
            if(auth('super_admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('login.show')->with('message', 'Invalid Email or Password');
            }
        }elseif( $user ){
            if(auth('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('login.show')->with('message', 'Invalid Email or Password');
            }
        }else{
            return redirect()->route('login.show')->with('message', 'No Recored Matches');
        }
    }
}
