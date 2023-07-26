@extends('layouts.master')

@section('title')
@lang('Edit Cake')
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('title') Edit Cake @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('cake.update') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                @method('PATCH')

                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                    <img id="frame" style="border: 1px solid" class="rounded me-2" width="200"  name="default" alt="{{$cake->image_name}}" src="{{ asset('storage/'.$cake->image_path) }}" data-holder-rendered="true">
                        <br/><br/>
                        <div class="flex-grow-1 ">
                            <span class="text-danger">*</span>
                            <br>
                            <label>Please upload an image of the cake</label>
                            <div class="col-md-7">
                                <label class="input-group-text"  for="cake_img">Choose An Image</label> 
                                <input class="form-control" type="file" id="cake_img" value="{{old('cake_img')}}"
                                    name="cake_img" style="display: none;"  
                                    data-parsley-filemaxmegabytes="2" onchange="preview()"
                                    data-parsley-fileextension='png|jpeg|jpg' data-parsley-fileextension-message="* {{  Config::get('validationMessage.cake.cake_img.required') }}"
                                    data-parsley-filemaxmegabytes-message="* {{  Config::get('validationMessage.cake.cake_img.filemaxmegabytes') }}" 
                                    data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/jpg, image/png" 
                                    data-parsley-filemimetypes-message="* {{  Config::get('validationMessage.cake.cake_img.filemimetypes') }}">   
                            </div>
                        </div>
                    </div>
                </div>
                
                <br/>

                <input name="cake_id" type="hidden" class="form-control" id="cake_id" value="{{ $cake->id }}">

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Cake Name</label>
                    <div class="col-md-10">
                        <input name="name" type="text" class="form-control" id="name" value="{{$cake->name}}"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.cake.name.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                    <div class="col-md-10">                   
                        <textarea class="form-control" name="description" rows="3"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.cake.description.required') }}" data-parsley-trigger="keyup">{{$cake->description}}</textarea>
                    </div>
                </div>
                
                <div class="mb-2 row">
                    <label for="cake_shape" class="col-md-2 col-form-label control-label">Cake Shape</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_shape" name="cake_shape"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.cake.shape.required') }}" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer1">
                            <option value="" data-price="0">-- Select --</option>
                            @foreach($shape as $i => $data)
                                <option value="{{$data->id}}" data-price="{{$data->price}}" {{ (old('cake_shape', $cake->shape_id) == $data->id) ? 'selected' : ''; }}>{{$data->name}}</option>
                            @endforeach
                        </select>
                        <div id="errorContainer1"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_flavour" class="col-md-2 col-form-label control-label">Cake Flavour</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_flavour" name="cake_flavour"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.cake.flavour.required') }}" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer2">
                            <option value="" data-price="0">-- Select --</option>
                            @foreach($flavour as $i => $data)
                                <option value="{{$data->id}}" data-price="{{$data->price}}" {{ (old('cake_flavour', $cake->flavour_id) == $data->id) ? 'selected' : ''; }}>{{$data->name}}</option>
                            @endforeach
                        </select>
                        <div id="errorContainer2"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_cream" class="col-md-2 col-form-label control-label">Cream Flavour</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_cream" name="cake_cream"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.cake.cream.required') }}" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer3">
                            <option value="" data-price="0">-- Select --</option>
                            @foreach($cream as $i => $data)
                                <option value="{{$data->id}}" data-price="{{$data->price}}"{{ (old('cake_cream', $cake->cream_id) == $data->id) ? 'selected' : ''; }}>{{$data->name}}</option>
                            @endforeach
                        </select>
                        <div id="errorContainer3"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_size" class="col-md-2 col-form-label control-label">Cake Size</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_size" name="cake_size"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.cake.size.required') }}" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer4">
                            <option value="" data-price="0">-- Select --</option>
                            @foreach($size as $i => $data)
                                <option value="{{$data->id}}" data-price="{{$data->price}}"{{ (old('cake_size', $cake->size_id) == $data->id) ? 'selected' : ''; }}>{{$data->name}}</option>
                            @endforeach
                        </select>
                        <div id="errorContainer4"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_tier" class="col-md-2 col-form-label control-label">No. of Tier</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_tier" name="cake_tier"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.cake.tier.required') }}" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer5">
                            <option value="" data-price="0">-- Select --</option>
                            @foreach($tier as $i => $data)
                                <option value="{{$data->id}}" data-price="{{$data->price}}" {{ (old('cake_tier', $cake->tier_id) == $data->id) ? 'selected' : ''; }}>{{$data->name}}</option>
                            @endforeach
                        </select>
                        <div id="errorContainer5"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_deco" class="col-md-2 col-form-label control-label">Decoration</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_deco" name="cake_deco"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.cake.deco.required') }}" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer6">
                            <option value="" data-price="0">-- Select --</option>
                            @foreach($deco as $i => $data)
                                <option value="{{$data->id}}" data-price="{{$data->price}}" {{ (old('cake_deco', $cake->deco_id) == $data->id) ? 'selected' : ''; }}>{{$data->name}}</option>
                            @endforeach
                        </select>
                        <div id="errorContainer6"></div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="price" class="col-md-2 col-form-label control-label">Estimated Price (RM)</label>
                    <div class="col-md-10">
                        <input name="total_price" type="number" class="form-control" id="total_price" step="0.01" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save">@lang('button.save')</button>
                        <a class="btn btn-danger float-end me-2 swal-delete">@lang('button.delete')</a>
                        <a href="{{ route('cake.view', ['cake_id'=> $cake->id]) }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                    </div>
                </div>

            </form>

            <form id="delete-form" method="POST" action="{{ route('cake.delete') }}">
                {{ csrf_field() }} 
                {{ method_field('DELETE') }}
                <input name="cake_id" type="hidden" class="form-control" id="cake_id" value="{{ $cake->id }}">
            </form>

        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
<!-- form advanced init -->
<script src="{{ URL::asset('/build/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ URL::asset('/build/js/pages/Cake/editForm.js') }}"></script>
@component('components.alert')@endcomponent
@endsection