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
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $five_star = Review::where([['overall_stars',5]])->orderBy('reviewed_on', 'DESC')->get();
        $four_star = Review::where([['overall_stars',4]])->orderBy('reviewed_on', 'DESC')->get();
        $three_star = Review::where([['overall_stars',3]])->orderBy('reviewed_on', 'DESC')->get();
        $two_star = Review::where([['overall_stars',2]])->orderBy('reviewed_on', 'DESC')->get();
        $one_star = Review::where([['overall_stars',1]])->orderBy('reviewed_on', 'DESC')->get();
        $zero_star = Review::where([['overall_stars',0]])->orderBy('reviewed_on', 'DESC')->get();

        return view('Review.index', 
        [
            'five_star' => $five_star,
            'four_star' => $four_star,
            'three_star' => $three_star,
            'two_star' => $two_star,
            'one_star' => $one_star,
            'zero_star' => $zero_star,
        ]);
    }

    public function create(Request $request)
    {
        $order_id = $request->order_id;
        // dd($order_id);
        $user_id = auth()->user()->id;

        $order = Order::where([['payment_status',1],['cust_id',$user_id], ['id',$order_id], ['status_data',1]])->first();

        return view('Review.create', 
        [
            'order' => $order
        ]);
    }

    public function save(Request $request)
    {
        $order_id = $request->order_id;
        $user_id = auth()->user()->id;
        $overall_stars = $request->overall_stars ?? 0;
        $design_stars = $request->design_stars ?? 0;
        $taste_stars = $request->taste_stars ?? 0;
        $service_stars = $request->service_stars ?? 0;
        $comment = $request->comment ?? '';

        $review = new Review;

        $review->order_id       = $order_id;
        $review->cust_id        = $user_id;
        $review->overall_stars  = $overall_stars;
        $review->design_stars   = $design_stars;
        $review->taste_stars    = $taste_stars;
        $review->service_stars  = $service_stars;
        $review->comment        = $comment;
        $review->reviewed_on    = date('Y-m-d H:i:s');

        $saved1 = $review->save();

        $order = Order::where([['cust_id',$user_id], ['id',$order_id], ['status_data',1]])->first();

        $order->review = 1;

        $saved2 = $order->save();

        if($saved1 && $saved2)
        {
            return redirect()->route('order.custIndex')->with([
                'success' => 'Review successfully submitted!',
            ]);
        }
        else 
        {
            return redirect()->route('order.custIndex')->with([
                'error' => 'Review submission unsuccessful',
            ]);
        }
    }

    public function view(Request $request)
    {
        $order_id = $request->order_id;

        $order = Order::where([['id',$order_id]])->first();

        $order_detail = OrderDetail::where([['order_id',$order_id]])->first();

        $review = Review::where([['order_id',$order_id]])->first();

        return view('Review.view', 
        [
            'order' => $order,
            'order_detail' => $order_detail,
            'review' => $review,
        ]);
    }

}
