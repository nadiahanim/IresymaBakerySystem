<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;

class ProfileController extends Controller
{
    use SendsPasswordResetEmails;

    public function view()
    {
        $user_id = auth()->user()->id;

        $user_data = User::where([['id',$user_id]])->first();

        return view('Profile.view', 
        [
            'user_data' => $user_data
        ]);
    }

    public function edit()
    {
        $user_id = auth()->user()->id;

        $user_data = User::where([['id',$user_id]])->first();

        return view('Profile.edit', 
        [
            'user_data' => $user_data
        ]);

    }

    public function update(Request $request)
    {
        $name       = $request->name;
        $phone_no   = $request->phone_no;
        $address    = $request->address;
        $email      = $request->email;

        $user_id = auth()->user()->id;

        $user_data = User::where([['id',$user_id]])->first();

        $user_data->fullname     = $name;
        $user_data->phone        = $phone_no;
        $user_data->address      = $address;
        $user_data->email        = $email;
        $user_data->updated_on   = date('Y-m-d H:i:s');

        $saved = $user_data->save();

        if($saved)
        {
            return redirect()->route('profile.view')->with([
                'success' => 'Profile successfully updated!',
            ]);
        }
        else 
        {
            return redirect()->route('profile.edit')->with([
                'error' => 'Profile update unsuccessful',
            ]);
        }
    }
}
