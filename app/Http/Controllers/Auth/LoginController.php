<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function login()
    {
        return view('auth/login');
    }

    public function loginCheck(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        // dd($email);
        // dd($password);

        $credentials = array(
            "email"=> $email, 
            "password"=> $password,
            );

        if (auth()->attempt($credentials)) {

            if(auth()->user()->status_data === 1){
                return redirect()->route('root')->with([
                    'success' => config('validationMessage.login.success'),
                ]);
            }else{

                auth()->logout();
        
                return redirect()->route('login')->with([
                    'error' => config('validationMessage.login.error'),
                ]);
            }

        }else{

            return redirect()->route('login')->with([
                'error' => config('validationMessage.login.all'),
            ]); 
            
        }

    }

    public function logout()
    {
        auth()->logout();
        session()->flush();

        // return redirect()->route('login')->with([
        //     'success' => 'Successfully logout',
        // ]);

        return redirect()->route('root')->with([
            'success' => 'Successfully logged out.',
        ]);
    }

}
