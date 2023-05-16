<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Order;
use App\Models\Category;
use App\Models\Service;
use App\Models\Calendar;

class OrderController extends Controller
{

    public function index()
    {
        
    }

    public function create()
    {
        $categories = Category::where([['status_data',1]])->get();

        $shape = Service::where([['category_id',1], ['status_data',1]])->get();

        $flavour = Service::where([['category_id',2], ['status_data',1]])->get();

        $cream = Service::where([['category_id',3], ['status_data',1]])->get();

        $size = Service::where([['category_id',4], ['status_data',1]])->get();

        $tier = Service::where([['category_id',5], ['status_data',1]])->get();

        $deco = Service::where([['category_id',6], ['status_data',1]])->get();

        $postcode = Service::where([['category_id',7], ['status_data',1]])->get();

        $dates = Calendar::where([['status_data',1]])->get();

        $disabled_dates = array();

        foreach($dates as $i => $data)
        {
            $disabled_dates[$i] = $data->disable_date;
        }


        return view('Order.create', 
        [
            'categories' => $categories,
            'shape' => $shape,
            'flavour' => $flavour,
            'cream' => $cream,
            'size' => $size,
            'tier' => $tier,
            'deco' => $deco,
            'postcode' => $postcode,
            'disabled_dates' => $disabled_dates
        ]);
    }

    public function save(Request $request)
    {

    }

    public function view(Request $request)
    {
        
    }

    public function edit(Request $request)
    {
        
    }

    public function update(Request $request)
    {
        
    }

    public function delete(Request $request)
    {
        
    }

}
