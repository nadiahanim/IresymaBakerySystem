<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use App\Models\Bakery;

class BakeryController extends Controller
{
    public function view()
    {
        $bakery_data = Bakery::first();

        return view('Bakery.view', 
        [
            'bakery_data' => $bakery_data
        ]);
    }

    public function edit()
    {
        $bakery_data = Bakery::first();

        return view('Bakery.edit', 
        [
            'bakery_data' => $bakery_data
        ]);
    }

    public function update(Request $request)
    {
        $name = $request->name;
        $location = $request->location;
        $phone_no = $request->phone_no;
        $description = $request->description;

        $bakery_data = Bakery::first();

        $bakery_data->bakery_name = $name;
        $bakery_data->bakery_location = $location;
        $bakery_data->bakery_contact = $phone_no;
        $bakery_data->bakery_desc = $description;
        $bakery_data->updated_on = date('Y-m-d H:i:s');

        $saved = $bakery_data->save();

        if($saved)
        {
            return redirect()->route('bakery.view')->with([
                'success' => 'Bakery info successfully updated!',
            ]);
        }
        else 
        {
            return redirect()->route('bakery.edit')->with([
                'error' => 'Bakery info update unsuccessful',
            ]);
        }
    }

}
