@extends('layouts.master')

@section('title')
{{ $product->product_name }}
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Product Details @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-xl-6">
                    <div class="row" style="display: flex; justify-content: center;align-items: center;">
                        <div class="px-5 py-5">
                        @if ($product->image_path)
                            <img width="200" src="{{ asset('storage/'.$product->image_path) }}" alt="{{$product->image_name}}" class="img-fluid mx-auto d-block">
                        @else
                        <img width="200" src="{{ URL::asset('build/images/tepung.png') }}" alt="No Image" class="img-fluid mx-auto d-block">
                        @endif
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="mt-4 mt-xl-3">
                        <a href="javascript: void(0);" class="text-primary" style="pointer-events: none;">
                        @if($product->product_type == 1)
                            Bread
                        @elseif ($product->product_type == 2)
                            Cakes
                        @elseif ($product->product_type == 3)
                            Cookies
                        @else
                            Pastries
                        @endif
                        </a>
                        <h4 class="mt-2 mb-3">{{ $product->product_name }}</h4>
                        <a href="javascript: void(0);" class="text-secondary" style="pointer-events: none;">Produced by {{ $product->brand }}</a>
                        <h5 class="mt-2 mb-4">Price : <b>MYR {{ $product->price }}</b></h5>
                        <p class="text-muted mb-4">{{ $product->description }}</p>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div>
                                    <p class="text-muted"><i class="bx bx-food-menu font-size-16 align-middle text-primary me-1"></i>{{ $product->ingredients }}</p>
                                    <p class="text-muted"><i class="bx bx-dizzy font-size-16 align-middle text-danger me-1"></i>{{ $product->allergen }}</p>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-1 mb-4"><span class="text-muted me-2"></span>Availability :
                            @if ($product->quantity == 0)
                                <b style="color:red">Sold Out</b>
                            @elseif ($product->quantity < 3)
                                <b style="color:red">Only {{ $product->quantity }} left</b>
                            @else
                                <b>{{ $product->quantity }}</b>
                            @endif
                        </h5>
                        <p class="my-0"><span class="text-muted me-2"></span>last updated: {{ date('d/m/Y h:i a', strtotime($product->updated_on)) }}</p>
                    </div>
                </div>
            </div>

            @if(isset(Auth::user()->user_type) && Auth::user()->user_type == 1)
            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="{{ route('product.edit', ['product_id'=> $product->id]) }}" class="btn btn-primary float-end">Edit</a>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                </div>
            </div>
            @else
            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="{{ route('product.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script>
    $("input[name='quantity']").TouchSpin({
        min: 0,
        max: 600,
        step: 1,
    });
</script>
<!-- form advanced init -->
<script src="{{ URL::asset('/build/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ URL::asset('/build/js/pages/Product/form.js') }}"></script>
@endsection