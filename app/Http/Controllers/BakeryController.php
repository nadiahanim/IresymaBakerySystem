<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Bakery;
use App\Models\BakeryImage;

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

    public function custView()
    {
        $bakery_data = Bakery::first();

        return view('Bakery.custView', 
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

        if($request->operation)
        {
            $operation = 1;
        }
        else
        {
            $operation = 0;
        }

        $bakery_data = Bakery::first();

        $bakery_data->bakery_name = $name;
        $bakery_data->bakery_location = $location;
        $bakery_data->bakery_contact = $phone_no;
        $bakery_data->bakery_desc = $description;
        $bakery_data->bakery_operation = $operation;
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

    public function updateImage(Request $request)
    {
        $file = $request->file('file');
        dd($file);

        if($request->file('file')) {
            $filename = time().'.'.$file->getClientOriginalExtension();

            $file->storeAs('public/images/bakery', $filename);

            $bakery_image = new BakeryImage;

            $bakery_image->bakery_id = 1;
            $bakery_image->bakery_pic = $filename;
            $bakery_image->updated_on = date('Y-m-d H:i:s');
        }

    }


}
