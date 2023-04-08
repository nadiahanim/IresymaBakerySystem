<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');

        $disabled_dates = Calendar::where([['status_data',1],['disable_date', '>=',$today]])->get();

        return view('Calendar.index', 
        [
            'disabled_dates' => $disabled_dates
        ]);
    }

    public function edit()
    {
        $dates = Calendar::where([['status_data',1]])->get();

        $disabled_dates = array();

        foreach($dates as $i => $data)
        {
            $disabled_dates[$i] = $data->disable_date;
        }

        return view('Calendar.edit', 
        [
            'disabled_dates' => $disabled_dates
        ]);
    }

    public function save(Request $request)
    {
        $total_save = 0;

        $date_string = $request->selected_dates;

        $date_array = explode(", ", $date_string);

        foreach($date_array as $i => $date)
        {
            $selected_date = \Carbon\Carbon::createFromFormat('m/d/Y', $date);
            $formattedDate = $selected_date->format('Y-m-d');

            $calendar[$i] = new Calendar;
            $calendar[$i]->disable_date  = $formattedDate;
            $calendar[$i]->status_data   = 1;
            $calendar[$i]->updated_on    = date('Y-m-d H:i:s');

            $saved = $calendar[$i]->save();
            $total_save++;
        }

        if($total_save == count($date_array))
        {
            return redirect()->route('calendar.index')->with([
                'success' => 'New disabled date successfully added!',
            ]);
        }
        else
        {
            return redirect()->route('calendar.index')->with([
                'error' => 'New disabled date addition unsuccessful',
            ]);
        }
    }

    public function delete(Request $request)
    {
        $date_id = $request->date_id;

        $calendar = Calendar::where([['id',$date_id]])->first();

        $calendar->status_data   = 0;
        $calendar->updated_on    = date('Y-m-d H:i:s');

        $saved = $calendar->save();
        
        if($saved)
        {
            return redirect()->route('calendar.index')->with([
                'success' => 'Date deleted successfully!',
            ]);
        }
        else 
        {
            return redirect()->route('calendar.index')->with([
                'error' => 'Date delete unsuccessful',
            ]);
        }
    }

}
