<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function register(){

        return view('auth/register');

    }

    public function registerUser(Request $request){

        $name       = $request->name;
        $phone_no   = $request->phone_no;
        $address    = $request->address;
        $email      = $request->email;
        $password   = $request->password;

        // search for the same registered email in the database
        $existing_user = User::where([['email',$email],['status_data',1]])->first();

        if ($existing_user)
        {
            //the same email has been registered
            return redirect()->route('register')->with([
                'error' => 'This email has been registered',
            ]);
        }
        else
        {
            $new_user = new User;

            $new_user->fullname     = $name;
            $new_user->phone        = $phone_no;
            $new_user->address      = $address;
            $new_user->email        = $email;
            $new_user->password     = bcrypt($password);
            $new_user->user_type    = 2;
            $new_user->updated_on   = date('Y-m-d H:i:s');
            $new_user->status_data  = 1;

            $saved = $new_user->save();

            if($saved)
            {
                return redirect()->route('login')->with([
                    'success' => config('validationMessage.register.success'),
                ]);
            }
            else 
            {
                return redirect()->route('register')->with([
                    'error' => config('validationMessage.register.error'),
                ]);
            }
        }

        
        
    }
}
