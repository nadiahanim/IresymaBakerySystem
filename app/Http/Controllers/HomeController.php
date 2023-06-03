<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        $all_orders = Order::where([['payment_status',1],['order_status',4],['status_data',1]])->get();

        $total_order = $all_orders->count();

        $revenue = 0;

        foreach($all_orders as $i=>$data)
        {
            $revenue = $revenue + $data->total_price;
        }

        $products = Product::where([['status_data',1]])->get();

        $pieChartData = [];
        $new_orders = Order::where([['payment_status',1], ['order_status',1], ['status_data',1]])->get();
        $pieChartData[] = [
            'x' => 'New',
            'y' => $new_orders->count(),
        ];
        $in_progress_orders = Order::where([['payment_status',1], ['order_status',2], ['status_data',1]])->get();
        $pieChartData[] = [
            'x' => 'In Progress',
            'y' => $in_progress_orders->count(),
        ];
        $ready_orders = Order::where([['payment_status',1], ['order_status',3], ['status_data',1]])->get();
        $pieChartData[] = [
            'x' => 'Ready',
            'y' => $ready_orders->count(),
        ];
        $completed_orders = Order::where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $pieChartData[] = [
            'x' => 'Completed',
            'y' => $completed_orders->count(),
        ];
        $cancelled_orders = Order::where([['payment_status',1], ['order_status',5], ['status_data',1]])->get();
        $pieChartData[] = [
            'x' => 'Cancelled',
            'y' => $cancelled_orders->count(),
        ];

        $donutChartData = [];
        $five_star = Review::where([['overall_stars',5]])->get();
        $donutChartData[] = [
            'x' => '5 Stars',
            'y' => $five_star->count(),
        ];
        $four_star = Review::where([['overall_stars',4]])->get();
        $donutChartData[] = [
            'x' => '4 Stars',
            'y' => $four_star->count(),
        ];
        $three_star = Review::where([['overall_stars',3]])->get();
        $donutChartData[] = [
            'x' => '3 Stars',
            'y' => $three_star->count(),
        ];
        $two_star = Review::where([['overall_stars',2]])->get();
        $donutChartData[] = [
            'x' => '2 Stars',
            'y' => $two_star->count(),
        ];
        $one_star = Review::where([['overall_stars',1]])->get();
        $donutChartData[] = [
            'x' => '1 Star',
            'y' => $one_star->count(),
        ];
        $zero_star = Review::where([['overall_stars',0]])->get();
        $donutChartData[] = [
            'x' => '0 Star',
            'y' => $zero_star->count(),
        ];

        $lineChartData = [];
        $jan = Order::whereMonth('ordered_on',1) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $jan->count(),
        ];

        $feb = Order::whereMonth('ordered_on',2) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $feb->count(),
        ];  

        $mar = Order::whereMonth('ordered_on',3) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $mar->count(),
        ];

        $apr = Order::whereMonth('ordered_on',4) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $apr->count(),
        ];
        $may = Order::whereMonth('ordered_on',5) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $may->count(),
        ];
        $jun = Order::whereMonth('ordered_on',6) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $jun->count(),
        ];
        $jul = Order::whereMonth('ordered_on',7) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $jul->count(),
        ];
        $aug = Order::whereMonth('ordered_on',8) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $aug->count(),
        ];
        $sep = Order::whereMonth('ordered_on',9) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $sep->count(),
        ];
        $oct = Order::whereMonth('ordered_on',10) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $oct->count(),
        ];
        $nov = Order::whereMonth('ordered_on',11) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $nov->count(),
        ];
        $dec = Order::whereMonth('ordered_on',12) 
                    ->where([['payment_status',1], ['order_status',4], ['status_data',1]])->get();
        $lineChartData[] = [
            'x' => $dec->count(),
        ];

        return view('index',[
            'total_order' => $total_order,
            'revenue' => $revenue,
            'products' => $products,
            'pieChartData' => $pieChartData,
            'five_star' => $five_star,
            'donutChartData' => $donutChartData,
            'lineChartData' => $lineChartData,
        ]);
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }
}
