@extends('layouts.master')

@section('title')
@lang('View Order Review')
@endsection

@section('css')
<!-- Bootstrap Rating css -->
<link href="{{ URL::asset('build/libs/bootstrap-rating/bootstrap-rating.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('title') View Order Review @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

                <h4 class="mt-2 mb-3">Order #{{ $order->id }}</h4>
                <p class="my-1"><span class="text-muted me-2"></span>Ordered on: {{date('d/m/Y', strtotime($order->ordered_on))}}</p>
                <br>

                <h4 class="mb-3">Customer's Information</h4>
                <p class="my-1"><span class="text-muted me-2"></span>Name&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $order->customer->fullname }}</p>
                <p class="my-1"><span class="text-muted me-2"></span>Email&emsp;&emsp;&emsp;&emsp;&emsp; : {{ $order->customer->email }}</p>
                <p class="my-1"><span class="text-muted me-2"></span>Telephone No.&emsp;: {{ $order->customer->phone }}</p>
                <br>

                <h4 class="mb-3">Delivery Information</h4>
                <p class="my-1"><span class="text-muted me-2"></span>Delivery Date&emsp;&emsp;&emsp;: {{date('d/m/Y', strtotime($order->deli_date))}}</p>
                <p class="my-1"><span class="text-muted me-2"></span>Delivery Time&emsp;&emsp;&emsp;: {{date('h:i a', strtotime($order->deli_time))}}</p>
                <p class="my-1"><span class="text-muted me-2"></span>Delivery Location&emsp; : {{ $order->deli_address1 }} {{ $order->deli_address2 }} {{ $order->postcode->name }}</p>
                <br>

                <h4 class="mb-3">Cake Information</h4>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Detail</th>
                                    <th>Price(RM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Shape</th>
                                    <td>{{ $order_detail->cakeShape->name }}</td>
                                    <td>{{ $order_detail->cakeShape->price }}</td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td>{{ $order_detail->cakeSize->name }}</td>
                                    <td>{{ $order_detail->cakeSize->price }}</td>
                                </tr>
                                <tr>
                                    <th>No. of Tier</th>
                                    <td>{{ $order_detail->cakeTier->name }}</td>
                                    <td>{{ $order_detail->cakeTier->price }}</td>
                                </tr>
                                <tr>
                                    <th>Flavour</th>
                                    <td>{{ $order_detail->cakeFlavour->name }}</td>
                                    <td>{{ $order_detail->cakeFlavour->price }}</td>
                                </tr>
                                <tr>
                                    <th>Cream</th>
                                    <td>{{ $order_detail->creamFlavour->name }}</td>
                                    <td>{{ $order_detail->creamFlavour->price }}</td>
                                </tr>                           
                                <tr>
                                    <th>Decoration</th>
                                    <td>{{ $order_detail->cakeDeco->name }}</td>
                                    <td>{{ $order_detail->cakeDeco->price }}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Charge</th>
                                    <td>{{ $order->postcode->name }}</td>
                                    <td>{{ $order->postcode->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="special_message" class="col-md-2 col-form-label control-label">Special Message</label>
                    <div class="col-md-8">
                        <input name="special_message" type="text" class="form-control" id="special_message" value="{{ $order_detail->special_message }}" disabled>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="note" class="col-md-2 col-form-label control-label">Important Note</label>
                    <div class="col-md-8">
                        <input name="note" type="text" class="form-control" id="note" value="{{ $order_detail->note }}" disabled>
                    </div>
                </div>

                <br><br>

                <div class="mb-2 row">
                    <label for="order_status" class="col-md-2 col-form-label control-label">Sample Image</label>
                    <div class="col-md-3">
                        <div class="row" style="display: flex; justify-content: center;align-items: center;">
                            <div style="height:220;width:200;border:solid;">
                            @if($order_detail->sample_image_path)
                                <img width="200" src="{{ asset('storage/'.$order_detail->sample_image_path) }}" alt="{{$order_detail->sample_image_name}}" class="img-fluid mx-auto d-block">
                            @else
                                <img width="200" src="{{ URL::asset('build/images/tepung.png') }}" alt="No Image" class="img-fluid mx-auto d-block">
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <input  type="hidden" class="form-control" name="order_id" id="order_id" value="{{ $order->id }}">

                <div class="mb-2 row">
                    <label for="order_status" class="col-md-2 col-form-label control-label">Order Status</label>
                    <div class="col-md-8 pt-1">
                        @if($order->order_status == 1)
                        <span class="badge rounded-pill badge-soft-info font-size-16"
                            id="task-status">New</span>
                            
                        @elseif($order->order_status == 2)
                        <span class="badge rounded-pill badge-soft-warning font-size-16"
                            id="task-status">In Progress</span>

                        @elseif($order->order_status == 3)
                        <span class="badge rounded-pill badge-soft-success font-size-16"
                            id="task-status">Ready</span>
                            
                        @elseif($order->order_status == 4)
                        <span class="badge rounded-pill badge-soft-success font-size-16"
                            id="task-status">Completed</span>

                        @else
                        <span class="badge rounded-pill badge-soft-danger font-size-16"
                            id="task-status">Cancelled</span>

                        @endif
                    </div>
                </div>

                <h4 id="display_price" class="card-title mb-4 text-end text-primary" style="font-size:25px;margin-top:10px;margin-right:10px;">Total Price : RM{{ $order->total_price }}</h4>

                <h4 id="display_deposit" class="card-title mb-4 text-end text-info" style="font-size:15px;margin-top:10px;margin-right:10px;">Deposit Price : RM{{ $order->deposit_price }}</h4>

                @if($order->order_status == 4 && $order->review == 1)
                <br>
                <h4 class="mb-3">Review</h4>
                <div class="row mb-2">
                    <label for="overall" class="col-md-2 col-form-label control-label">Overall</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="overall_stars" value="{{ $review->overall_stars }}" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger" disabled/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="design" class="col-md-2 col-form-label control-label">Design</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="design_stars" value="{{ $review->design_stars }}" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger" disabled/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="taste" class="col-md-2 col-form-label control-label">Taste</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="taste_stars" value="{{ $review->taste_stars }}" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger" disabled/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="service" class="col-md-2 col-form-label control-label">Service</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="service_stars" value="{{ $review->service_stars }}" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger" disabled/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="comment" class="col-md-2 col-form-label control-label">Comment</label>
                    <div class="col-md-8">                   
                        <textarea class="form-control" name="comment" rows="4" disabled>{{ $review->comment }}</textarea>
                    </div>
                </div>
                @else
                @endif

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <a href="{{ route('review.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                    </div>
                </div>

        </div>
    </div>
</div>
<!-- end row -->


@endsection

@section('script')
<!-- Bootstrap rating js -->
<script src="{{ URL::asset('build/libs/bootstrap-rating/bootstrap-rating.min.js') }}"></script>

<script src="{{ URL::asset('/build/js/pages/rating-init.js') }}"></script>
@component('components.alert')@endcomponent
@endsection