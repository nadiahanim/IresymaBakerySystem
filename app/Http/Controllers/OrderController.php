<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Service;
use App\Models\Calendar;

class OrderController extends Controller
{

    public function index()
    {
        $all_orders = Order::where([['status_data',1]])->orderBy('updated_on', 'DESC')->get();

        $new_orders = Order::where([['order_status',1], ['status_data',1]])->get();

        $in_progress_orders = Order::where([['order_status',2], ['status_data',1]])->get();

        $completed_orders = Order::where([['order_status',3], ['status_data',1]])->get();

        return view('Order.index', 
        [
            'all_orders' => $all_orders,
            'new_orders' => $new_orders,
            'in_progress_orders' => $in_progress_orders,
            'completed_orders' => $completed_orders,
        ]);
    }

    public function custIndex()
    {
        $user_id = auth()->user()->id;

        $new_orders = Order::where([['cust_id',$user_id], ['order_status',1], ['status_data',1]])->get();

        $in_progress_orders = Order::where([['cust_id',$user_id], ['order_status',2], ['status_data',1]])->get();

        $ready_orders = Order::where([['cust_id',$user_id], ['order_status',3], ['status_data',1]])->get();

        $completed_orders = Order::where([['cust_id',$user_id], ['order_status',4], ['status_data',1]])->get();

        $cancelled_orders = Order::where([['cust_id',$user_id], ['order_status',5], ['status_data',1]])->get();

        return view('Order.custIndex', 
        [
            'new_orders' => $new_orders,
            'in_progress_orders' => $in_progress_orders,
            'ready_orders' => $ready_orders,
            'completed_orders' => $completed_orders,
            'cancelled_orders' => $cancelled_orders,
        ]);
    }

    public function create(Request $request)
    {
        $cake_name = $request->cake_name;
        $default_shape = $request->default_shape;
        $default_flavour = $request->default_flavour;
        $default_cream = $request->default_cream;
        $default_size = $request->default_size;
        $default_tier = $request->default_tier;
        $default_deco = $request->default_deco;

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
            'cake_name' => $cake_name,
            'default_shape' => $default_shape,
            'default_flavour' => $default_flavour,
            'default_cream' => $default_cream,
            'default_size' => $default_size,
            'default_tier' => $default_tier,
            'default_deco' => $default_deco,
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
        $cake_shape     = $request->cake_shape;
        $cake_flavour   = $request->cake_flavour;
        $cake_cream     = $request->cake_cream;
        $cake_size      = $request->cake_size;
        $cake_tier      = $request->cake_tier;

        $cake_deco          = $request->cake_deco;
        $sample_image       = $request->file('sample_image')->getClientOriginalName();
        $path               = $request->file('sample_image')->storeAs('images/OrderSampleImage', $sample_image, 'public');
        $special_message    = $request->special_message;

        $deli_date      = $request->deli_date;
        $delivery_date = \Carbon\Carbon::createFromFormat('m/d/Y', $deli_date);
        $formatted_date = $delivery_date->format('Y-m-d');

        $deli_time      = $request->deli_time;
        $deli_address1  = $request->deli_address1;
        $deli_address2  = $request->deli_address2;
        $deli_postcode  = $request->deli_postcode;

        $total_price    = $request->total_price;
        $deposit_price  = $request->deposit_price;

        $order = new Order;

        $order->cust_id         = auth()->user()->id;
        $order->deli_date       = $formatted_date;
        $order->deli_time       = $deli_time;
        $order->deli_address1   = $deli_address1;
        $order->deli_address2   = $deli_address2;
        $order->deli_postcode   = $deli_postcode;
        $order->total_price     = $total_price;
        $order->deposit_price   = $deposit_price;
        $order->order_status    = 1;
        $order->status_data     = 1;
        $order->ordered_on      = date('Y-m-d H:i:s');
        $order->updated_on      = date('Y-m-d H:i:s');

        $saved1 = $order->save();

        $order_detail = new OrderDetail;

        $order_detail->order_id             = $order->id;
        $order_detail->cake_shape_id        = $cake_shape;
        $order_detail->cake_flavour_id      = $cake_flavour;
        $order_detail->cake_cream_id        = $cake_cream;
        $order_detail->cake_size_id         = $cake_size;
        $order_detail->cake_tier_id         = $cake_tier;
        $order_detail->cake_deco_id         = $cake_deco;
        $order_detail->sample_image_name    = $sample_image;
        $order_detail->sample_image_path    = $path;
        $order_detail->special_message      = $special_message;
        $order_detail->status_data          = 1;

        $saved2 = $order_detail->save();

        if($saved1 && $saved2)
        {
            return redirect()->route('cake.index')->with([
                'success' => 'New order successfully added!',
            ]);
        }
        else 
        {
            return redirect()->route('cake.create')->with([
                'error' => 'New order addition unsuccessful',
            ]);
        }

    }

    public function edit(Request $request)
    {
        $order_id = $request->order_id;

        $order = Order::where([['id',$order_id]])->first();

        $order_detail = OrderDetail::where([['order_id',$order_id]])->first();

        return view('Order.edit', 
        [
            'order' => $order,
            'order_detail' => $order_detail,
        ]);
    }

    public function update(Request $request)
    {
        $order_id = $request->order_id;
        $order_status = $request->order_status;

        $order = Order::where([['id',$order_id]])->first();

        $order->order_status    = $order_status;
        $order->updated_on      = date('Y-m-d H:i:s');

        $saved = $order->save();

        if($saved)
        {
            return redirect()->route('order.index')->with([
                'success' => 'Order status successfully updated!',
            ]);
        }
        else 
        {
            return redirect()->route('order.edit', ['order_id'=> $order_id])->with([
                'error' => 'Order status update unsuccessful',
            ]);
        }
    }

    public function view(Request $request)
    {
        $order_id = $request->order_id;

        $order = Order::where([['id',$order_id]])->first();

        $order_detail = OrderDetail::where([['order_id',$order_id]])->first();

        return view('Order.view', 
        [
            'order' => $order,
            'order_detail' => $order_detail,
        ]);
    }

}
