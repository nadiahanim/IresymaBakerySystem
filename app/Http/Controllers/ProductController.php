<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where([['status_data',1]])->get();

        return view('Product.index', 
        [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('Product.create', 
        [

        ]);
    }

    public function save(Request $request)
    {
        $name = $request->name;
        $product_type = $request->product_type;
        $brand = $request->brand;
        $description = $request->description;
        $ingredients = $request->ingredients;
        $allergen = $request->allergen;
        $price = $request->price;
        $quantity = $request->quantity;

        $product_image = $request->file('product_img')->getClientOriginalName();

        $path = $request->file('product_img')->storeAs('images/Product', $product_image, 'public');

        $product = new Product;

        $product->product_name = $name;
        $product->product_type = $product_type;
        $product->brand = $brand;
        $product->description = $description;
        $product->ingredients = $ingredients;
        $product->allergen = $allergen;
        $product->price = $price;
        $product->quantity = $quantity;
        $product->image_name = $product_image;
        $product->image_path = $path;
        $product->status_data = 1;
        $product->updated_on = date('Y-m-d H:i:s');

        $saved = $product->save();

        if($saved)
        {
            return redirect()->route('product.index')->with([
                'success' => 'New product successfully added!',
            ]);
        }
        else 
        {
            return redirect()->route('product.create')->with([
                'error' => 'New product addition unsuccessful',
            ]);
        }
    }

    public function view(Request $request)
    {
        $product_id = $request->product_id;

        $product = Product::where([['id',$product_id]])->first();
        
        return view('Product.view', 
        [
            'product' => $product
        ]);
    }

    public function edit(Request $request)
    {
        $product_id = $request->product_id;

        $product = Product::where([['id',$product_id]])->first();
        
        return view('Product.edit', 
        [
            'product' => $product
        ]);
    }

    public function update(Request $request)
    {
        $product_id = $request->product_id;
        $name = $request->name;
        $product_type = $request->product_type;
        $brand = $request->brand;
        $description = $request->description;
        $ingredients = $request->ingredients;
        $allergen = $request->allergen;
        $price = $request->price;
        $quantity = $request->quantity;

        $product = Product::where([['id',$product_id]])->first();

        $product->product_name = $name;
        $product->product_type = $product_type;
        $product->brand = $brand;
        $product->description = $description;
        $product->ingredients = $ingredients;
        $product->allergen = $allergen;
        $product->price = $price;
        $product->quantity = $quantity;
        $product->updated_on = date('Y-m-d H:i:s');

        if($request->file('product_img'))
        {
            $product_image = $request->file('product_img')->getClientOriginalName();
            $path = $request->file('product_img')->storeAs('images/Product', $product_image, 'public');

            $product->image_name = $product_image;
            $product->image_path = $path;
        }
        else {

        }

        $saved = $product->save();

        if($saved)
        {
            return redirect()->route('product.view', ['product_id' => $product_id])->with([
                'success' => 'Product update successful!',
            ]);
        }
        else 
        {
            return redirect()->route('product.view', ['product_id' => $product_id])->with([
                'error' => 'Product update unsuccessful',
            ]);
        }
    }

    public function delete(Request $request)
    {
        $product_id = $request->product_id;

        $product = Product::where([['id',$product_id]])->first();

        $product->status_data   = 0;
        $product->updated_on    = date('Y-m-d H:i:s');

        $saved = $product->save();
        
        if($saved)
        {
            return redirect()->route('product.index')->with([
                'success' => 'Product delete successful!',
            ]);
        }
        else 
        {
            return redirect()->route('product.view', ['product_id' => $product_id])->with([
                'error' => 'Product delete unsuccessful',
            ]);
        }
    }

    public function ajaxUpdateQuantity(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $product = Product::where([['id',$product_id]])->first();

        $product->quantity = $quantity;
        $product->updated_on = date('Y-m-d H:i:s');

        $saved = $product->save();

        if($saved)
        {
            return response()->json(201);
        }
        else 
        {

        }
    }

}
