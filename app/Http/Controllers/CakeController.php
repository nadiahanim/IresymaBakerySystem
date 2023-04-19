<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Cake;
use App\Models\Service;

class CakeController extends Controller
{

    public function index()
    {
        $cakes = Cake::where([['status_data',1]])->get();

        return view('Cake.index', 
        [
            'cakes' => $cakes
        ]);
    }

    public function create()
    {
        $shape = Service::where([['category_id',1], ['status_data',1]])->get();

        $flavour = Service::where([['category_id',2], ['status_data',1]])->get();

        $cream = Service::where([['category_id',3], ['status_data',1]])->get();

        $size = Service::where([['category_id',4], ['status_data',1]])->get();

        $tier = Service::where([['category_id',5], ['status_data',1]])->get();

        $deco = Service::where([['category_id',6], ['status_data',1]])->get();

        return view('Cake.create', 
        [
            'shape' => $shape,
            'flavour' => $flavour,
            'cream' => $cream,
            'size' => $size,
            'tier' => $tier,
            'deco' => $deco,
        ]);
    }

    public function save(Request $request)
    {
        $name           = $request->name;
        $description    = $request->description;
        $cake_shape     = $request->cake_shape;
        $cake_flavour   = $request->cake_flavour;
        $cake_cream     = $request->cake_cream;
        $cake_size      = $request->cake_size;
        $cake_tier      = $request->cake_tier;
        $cake_deco      = $request->cake_deco;
        $total_price    = $request->total_price;

        $cake_image = $request->file('cake_img')->getClientOriginalName();

        $path = $request->file('cake_img')->storeAs('images/CakeCatalogue', $cake_image, 'public');

        $cake = new Cake;

        $cake->name = $name;
        $cake->description = $description;
        $cake->shape_id = $cake_shape;
        $cake->flavour_id = $cake_flavour;
        $cake->cream_id = $cake_cream;
        $cake->size_id = $cake_size;
        $cake->tier_id = $cake_tier;
        $cake->deco_id = $cake_deco;
        $cake->price = $total_price;
        $cake->image_name = $cake_image;
        $cake->image_path = $path;
        $cake->status_data = 1;
        $cake->updated_on = date('Y-m-d H:i:s');

        $saved = $cake->save();

        if($saved)
        {
            return redirect()->route('cake.index')->with([
                'success' => 'New cake successfully added!',
            ]);
        }
        else 
        {
            return redirect()->route('cake.create')->with([
                'error' => 'New cake addition unsuccessful',
            ]);
        }
    }

    public function view(Request $request)
    {
        $cake_id = $request->cake_id;

        $cake = Cake::where([['id',$cake_id]])->first();
        
        return view('Cake.view', 
        [
            'cake' => $cake
        ]);
    }

    public function edit(Request $request)
    {
        $cake_id = $request->cake_id;

        $cake = Cake::where([['id',$cake_id]])->first();

        $shape = Service::where([['category_id',1], ['status_data',1]])->get();

        $flavour = Service::where([['category_id',2], ['status_data',1]])->get();

        $cream = Service::where([['category_id',3], ['status_data',1]])->get();

        $size = Service::where([['category_id',4], ['status_data',1]])->get();

        $tier = Service::where([['category_id',5], ['status_data',1]])->get();

        $deco = Service::where([['category_id',6], ['status_data',1]])->get();
        
        return view('Cake.edit', 
        [
            'cake' => $cake,
            'shape' => $shape,
            'flavour' => $flavour,
            'cream' => $cream,
            'size' => $size,
            'tier' => $tier,
            'deco' => $deco,
        ]);
    }

    public function update(Request $request)
    {
        $cake_id        = $request->cake_id;
        $name           = $request->name;
        $description    = $request->description;
        $cake_shape     = $request->cake_shape;
        $cake_flavour   = $request->cake_flavour;
        $cake_cream     = $request->cake_cream;
        $cake_size      = $request->cake_size;
        $cake_tier      = $request->cake_tier;
        $cake_deco      = $request->cake_deco;
        $total_price    = $request->total_price;

        $cake = Cake::where([['id',$cake_id]])->first();

        $cake->name = $name;
        $cake->description = $description;
        $cake->shape_id = $cake_shape;
        $cake->flavour_id = $cake_flavour;
        $cake->cream_id = $cake_cream;
        $cake->size_id = $cake_size;
        $cake->tier_id = $cake_tier;
        $cake->deco_id = $cake_deco;
        $cake->price = $total_price;
        $cake->updated_on = date('Y-m-d H:i:s');

        if($request->file('cake_img'))
        {
            $cake_image = $request->file('cake_img')->getClientOriginalName();
            $path = $request->file('cake_img')->storeAs('images/CakeCatalogue', $cake_image, 'public');

            $cake->image_name = $cake_image;
            $cake->image_path = $path;
        }
        else {

        }

        $saved = $cake->save();

        if($saved)
        {
            return redirect()->route('cake.view', ['cake_id' => $cake_id])->with([
                'success' => 'Cake update successful!',
            ]);
        }
        else 
        {
            return redirect()->route('cake.view', ['cake_id' => $cake_id])->with([
                'error' => 'Cake update unsuccessful',
            ]);
        }

    }

    public function delete(Request $request)
    {
        $cake_id = $request->cake_id;

        $cake = Cake::where([['id',$cake_id]])->first();

        $cake->status_data   = 0;
        $cake->updated_on    = date('Y-m-d H:i:s');

        $saved = $cake->save();
        
        if($saved)
        {
            return redirect()->route('cake.index')->with([
                'success' => 'Cake delete successful!',
            ]);
        }
        else 
        {
            return redirect()->route('cake.view', ['cake_id' => $cake_id])->with([
                'error' => 'Cake delete unsuccessful',
            ]);
        }
    }

}
