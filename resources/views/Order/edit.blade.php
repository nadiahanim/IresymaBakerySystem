@extends('layouts.master')

@section('title')
@lang('Update Order')
@endsection

@section('css')

@endsection

@section('content')

@component('components.breadcrumb')
@slot('title') Update Order @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('order.update') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                @method('PATCH')

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
                    <div class="col-md-8">
                        <select class="form-select select2" id="order_status" name="order_status"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.order.status.required') }}" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer">
                            <option value="">-- Select --</option>
                            <option value="1" {{ (old('order_status', $order->order_status) == 1) ? 'selected' : ''; }}>New</option>    
                            <option value="2" {{ (old('order_status', $order->order_status) == 2) ? 'selected' : ''; }}>In Progress</option> 
                            <option value="3" {{ (old('order_status', $order->order_status) == 3) ? 'selected' : ''; }}>Ready</option>  
                            <option value="4" {{ (old('order_status', $order->order_status) == 4) ? 'selected' : ''; }}>Completed</option>
                            <option value="5" {{ (old('order_status', $order->order_status) == 5) ? 'selected' : ''; }}>Cancelled</option>
                        </select>
                        <div id="errorContainer"></div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-update">@lang('button.save')</button>
                        <a href="{{ route('order.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- end row -->


@endsection

@section('script')
@component('components.alert')@endcomponent
@endsection