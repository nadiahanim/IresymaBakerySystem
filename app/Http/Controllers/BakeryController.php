<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Bakery;
use App\Models\OperatingHour;

class BakeryController extends Controller
{
    public function view()
    {
        $bakery_data = Bakery::first();
        $operating_hour = OperatingHour::all();

        return view('Bakery.view', 
        [
            'bakery_data' => $bakery_data,
            'operating_hour' => $operating_hour
        ]);
    }

    public function custView()
    {
        $bakery_data = Bakery::first();
        $operating_hour = OperatingHour::all();

        $day = date('d/m/Y');
        $currentDay = Carbon::createFromFormat('d/m/Y', $day)->format('l');

        $currentTime = date('H:i:s');

        foreach($operating_hour as $i=>$data)
        {
            if($data->day == $currentDay)
            {
                if($currentTime >= $data->start_hour && $currentTime <= $data->end_hour)
                {
                    $auto_operation = 1;
                }
                else
                {
                    $auto_operation = 0;
                }  
            }
        }

        return view('Bakery.custView', 
        [
            'bakery_data' => $bakery_data,
            'operating_hour' => $operating_hour,
            'auto_operation' => $auto_operation
        ]);
    }

    public function edit()
    {
        $bakery_data = Bakery::first();

        $operating_hour = OperatingHour::all();

        return view('Bakery.edit', 
        [
            'bakery_data' => $bakery_data,
            'operating_hour' => $operating_hour
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

        if($request->operation_type)
        {
            $operation_type = 1;

            $bakery_data->operation_type = $operation_type;

            $open_monday        = ($request->open_monday == 'on') ? 1 : 0;
            $start_monday       = $request->start_monday;
            $end_monday         = $request->end_monday;

            $open_tuesday       = ($request->open_tuesday == 'on') ? 1 : 0;
            $start_tuesday      = $request->start_tuesday;
            $end_tuesday        = $request->end_tuesday;

            $open_wednesday     = ($request->open_wednesday == 'on') ? 1 : 0;
            $start_wednesday    = $request->start_wednesday;
            $end_wednesday      = $request->end_wednesday;

            $open_thursday      = ($request->open_thursday == 'on') ? 1 : 0;
            $start_thursday     = $request->start_thursday;
            $end_thursday       = $request->end_thursday;

            $open_friday        = ($request->open_friday == 'on') ? 1 : 0;
            $start_friday       = $request->start_friday;
            $end_friday         = $request->end_friday;

            $open_saturday      = ($request->open_saturday == 'on') ? 1 : 0;
            $start_saturday     = $request->start_saturday;
            $end_saturday       = $request->end_saturday;

            $open_sunday        = ($request->open_sunday == 'on') ? 1 : 0;
            $start_sunday       = $request->start_sunday;
            $end_sunday         = $request->end_sunday;

            $operating_hour = OperatingHour::get();

            $operating_hour[0]->open_close  = $open_monday;
            $operating_hour[0]->start_hour  = $start_monday;
            $operating_hour[0]->end_hour    = $end_monday;
            $operating_hour[0]->save();

            $operating_hour[1]->open_close  = $open_tuesday;
            $operating_hour[1]->start_hour  = $start_tuesday;
            $operating_hour[1]->end_hour    = $end_tuesday;
            $operating_hour[1]->save();

            $operating_hour[2]->open_close  = $open_wednesday;
            $operating_hour[2]->start_hour  = $start_wednesday;
            $operating_hour[2]->end_hour    = $end_wednesday;
            $operating_hour[2]->save();

            $operating_hour[3]->open_close  = $open_thursday;
            $operating_hour[3]->start_hour  = $start_thursday;
            $operating_hour[3]->end_hour    = $end_thursday;
            $operating_hour[3]->save();

            $operating_hour[4]->open_close  = $open_friday;
            $operating_hour[4]->start_hour  = $start_friday;
            $operating_hour[4]->end_hour    = $end_friday;
            $operating_hour[4]->save();

            $operating_hour[5]->open_close  = $open_saturday;
            $operating_hour[5]->start_hour  = $start_saturday;
            $operating_hour[5]->end_hour    = $end_saturday;
            $operating_hour[5]->save();

            $operating_hour[6]->open_close  = $open_sunday;
            $operating_hour[6]->start_hour  = $start_sunday;
            $operating_hour[6]->end_hour    = $end_sunday;
            $operating_hour[6]->save();
        }
        else
        {
            $operation_type = 0;
            if($request->operation)
            {
                $operation = 1;
            }
            else
            {
                $operation = 0;
            }
            $bakery_data->operation_type = $operation_type;
            $bakery_data->bakery_operation = $operation;
        }

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
