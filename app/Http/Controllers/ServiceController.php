<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\Service;

class ServiceController extends Controller
{

    public function index()
    {
        $categories = Category::where([['status_data',1]])->get();

        $service_1 = Service::where([['category_id',1], ['status_data',1]])->get();
        $service_2 = Service::where([['category_id',2], ['status_data',1]])->get();
        $service_3 = Service::where([['category_id',3], ['status_data',1]])->get();
        $service_4 = Service::where([['category_id',4], ['status_data',1]])->get();
        $service_5 = Service::where([['category_id',5], ['status_data',1]])->get();
        $service_6 = Service::where([['category_id',6], ['status_data',1]])->get();
        $service_7 = Service::where([['category_id',7], ['status_data',1]])->get();

        return view('Service.index', 
        [
            'categories' => $categories,
            'service_1' => $service_1,
            'service_2' => $service_2,
            'service_3' => $service_3,
            'service_4' => $service_4,
            'service_5' => $service_5,
            'service_6' => $service_6,
            'service_7' => $service_7,
        ]);
    }

    public function create()
    {
        $categories = Category::where([['status_data',1]])->get();

        return view('Service.create', 
        [
            'categories' => $categories
        ]);
    }

    public function save(Request $request)
    {
        $category_id = $request->service_category;
        $name = $request->name;
        $price = $request->price;

        $service = new Service;

        $service->category_id   = $category_id;
        $service->name          = $name;
        $service->price         = $price;
        $service->status_data   = 1;
        $service->updated_on    = date('Y-m-d H:i:s');

        $saved = $service->save();

        if($saved)
        {
            return redirect()->route('service.index')->with([
                'success' => 'New service successfully added!',
            ]);
        }
        else 
        {
            return redirect()->route('service.create')->with([
                'error' => 'New service addition unsuccessful',
            ]);
        }
    }

    public function edit(Request $request)
    {
        $service_id = $request->service_id;

        $service = Service::where([['id',$service_id]])->first();

        $categories = Category::where([['status_data',1]])->get();

        return view('Service.edit', 
        [
            'service' => $service,
            'categories' => $categories
        ]);
    }

    public function update(Request $request)
    {
        $service_id = $request->service_id;
        $category_id = $request->service_category;
        $name = $request->name;
        $price = $request->price;

        $service = Service::where([['id',$service_id]])->first();

        $service->category_id   = $category_id;
        $service->name          = $name;
        $service->price         = $price;
        $service->updated_on    = date('Y-m-d H:i:s');

        $saved = $service->save();

        if($saved)
        {
            return redirect()->route('service.index')->with([
                'success' => 'Service update successful!',
            ]);
        }
        else 
        {
            return redirect()->route('service.index')->with([
                'error' => 'Service update unsuccessful',
            ]);
        }
    }

    public function delete(Request $request)
    {
        $service_id = $request->service_id;

        $service = Service::where([['id',$service_id]])->first();

        $service->status_data   = 0;
        $service->updated_on    = date('Y-m-d H:i:s');

        $saved = $service->save();
        
        if($saved)
        {
            return redirect()->route('service.index')->with([
                'success' => 'Service delete successful!',
            ]);
        }
        else 
        {
            return redirect()->route('service.index')->with([
                'error' => 'Service delete unsuccessful',
            ]);
        }
    }


}
