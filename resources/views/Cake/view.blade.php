@extends('layouts.master')

@section('title')
{{ $cake->name }}
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Our Best Cake Design @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <div class="row">

                <div class="col-xl-2">
                    <div class="mt-4 mt-xl-3">
                        <a href="javascript: void(0);" class="text-primary" style="pointer-events: none;">
 
                        </a>
                        <h1 class="mt-2 mb-3" style="font-family: 'Tangerine', cursive; font-size:600%; ">{{ $cake->name }}</h1>
                        
                        <h5 class="mt-2 mb-4" style="text-align: center;"><b>MYR {{ $cake->price }}</b></h5>

                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="row" style="display: flex; justify-content: center;align-items: center;">
                        <div class="px-6 py-6">
                        @if ($cake->image_path)
                            <img width="300" src="{{ asset('storage/'.$cake->image_path) }}" alt="{{$cake->image_name}}" class="img-fluid mx-auto d-block">
                        @else
                        <img width="300" src="{{ URL::asset('build/images/tepung.png') }}" alt="No Image" class="img-fluid mx-auto d-block">
                        @endif
                        </div>
                    </div>
                </div>

                

                <div class="col-xl-5">
                    <div class="mt-4">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                        Description
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-muted">{{ $cake->description }}</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        How to Order
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-muted">
                                        <p>Cake Shape: {{$cake->cakeShape->name}}<p>
                                        <p>Cake Flavour: {{$cake->cakeFlavour->name}}<p>
                                        <p>Cream Flavour: {{$cake->creamFlavour->name}}<p>
                                        <p>Cake Size: {{$cake->cakeSize->name}}<p>
                                        <p>Tier No.: {{$cake->cakeTier->name}}<p>
                                        <p>Decoration: {{$cake->cakeDeco->name}}<p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion -->
                    </div>
                </div>

            </div>

            @if(isset(Auth::user()->user_type) && Auth::user()->user_type == 1)
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <a href="{{ route('cake.edit', ['cake_id'=> $cake->id]) }}" class="btn btn-primary float-end">Edit</a>
                    <a href="{{ route('cake.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                </div>
            </div>
            @else
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <a href="{{ route('order.create', [
                        'default_shape'=>$cake->shape_id,
                        'default_flavour'=>$cake->flavour_id,
                        'default_cream'=>$cake->cream_id,
                        'default_size'=>$cake->size_id,
                        'default_tier'=>$cake->tier_id,
                        'default_deco'=>$cake->deco_id
                        ]) }}" class="btn btn-primary float-end">Order Now</a>
                    <a href="{{ route('cake.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
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
<!-- form advanced init -->
<script src="{{ URL::asset('/build/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ URL::asset('/build/js/pages/Product/form.js') }}"></script>
@endsection