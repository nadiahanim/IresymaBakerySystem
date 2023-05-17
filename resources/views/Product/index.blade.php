@extends('layouts.master')

@section('title')
@lang('My Products')
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') My Products @endslot
@endcomponent

<style>
    #productcard {
        cursor: pointer;
    }
</style>

<div class="row">
@if(isset(Auth::user()->user_type) && Auth::user()->user_type == 1)
    <div class="row mb-2">
        <div class="col-sm-11 offset-sm-1">
            <a type="button" href="{{ route('product.create')  }}" class="btn float-end waves-effect waves-light" style="background-color:#F2A0A0;color:white;">Add New Product</a>
        </div>
    </div>
@else
@endif

    <div class="card-body">
        <div class="row" id="product-list">
            @foreach($products as $i => $data)
            <div class="col-lg-3 col-sm-2" id="productcard" onclick="window.location.href='{{ route('product.view', ['product_id'=> $data->id])  }}';">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="{{ route('product.view', ['product_id'=> $data->id])  }}" class="text-dark" style="overflow-wrap: break-word;">{{ $data->product_name }}</a></h5>
                        </div>
                        <div class="product-img position-relative">
                            @if ($data->image_path)
                            <img width="200" src="{{ asset('storage/'.$data->image_path) }}" alt="{{$data->image_name}}"
                                class="img-fluid mx-auto d-block">
                            @else
                            <img width="200" src="{{ URL::asset('build/images/tepung.png') }}" alt="No Image"
                                class="img-fluid mx-auto d-block">
                            @endif
                        </div>

                        <div class="mt-4 text-center">
                            <h5 class="my-0"><span class="text-muted me-2"></span> <b>MYR {{ $data->price }}</b></h5>
                            <h5 class="my-0"><span class="text-muted me-2"></span>Availability:
                                @if ($data->quantity == 0)
                                    <b style="color:red">Sold Out</b>
                                @elseif ($data->quantity < 3)
                                    <b style="color:red">Only {{ $data->quantity }} left</b>
                                @else
                                    <b>{{ $data->quantity }}</b>
                                @endif
                            </h5>
                            <p class="my-0"><span class="text-muted me-2"></span>last updated: {{ date('d/m/Y h:i a', strtotime($data->updated_on)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')

@endsection