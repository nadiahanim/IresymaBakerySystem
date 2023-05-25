@extends('layouts.master')

@section('title')
@lang('Add New Product')
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Add New Product @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 

                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <img id="frame" style="border: 1px solid" class="rounded me-2" width="200"  name="default" alt="" src="{{ URL::asset('build/images/image-upload.png') }}" data-holder-rendered="true">
                        <br/><br/>
                        <div class="flex-grow-1 ">
                            <span class="text-danger">*</span>
                            <br>
                            <label>Please upload an image of the product</label>
                            <div class="col-md-7">
                                <label class="input-group-text"  for="product_img">Choose An Image</label> 
                                <input class="form-control" type="file" id="product_img" value="{{old('product_img')}}"
                                    name="product_img" style="display: none;"  
                                    data-parsley-filemaxmegabytes="2" onchange="preview()"
                                    data-parsley-fileextension='png|jpeg|jpg' data-parsley-fileextension-message="* {{  Config::get('validationMessage.product.product_img.required') }}"
                                    data-parsley-filemaxmegabytes-message="* {{  Config::get('validationMessage.product.product_img.filemaxmegabytes') }}" 
                                    data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/jpg, image/png" 
                                    data-parsley-filemimetypes-message="* {{  Config::get('validationMessage.product.product_img.filemimetypes') }}">   
                            </div>
                        </div>
                    </div>
                </div>
                
                <br/>

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Product Name</label>
                    <div class="col-md-10">
                        <input name="name" type="text" class="form-control" id="name"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.product.name.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>
                
                <div class="mb-2 row">
                    <label for="product_type" class="col-md-2 col-form-label control-label">Product Type</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="product_type" name="product_type"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.product.type.required') }}" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer">
                            <option value="">-- Select --</option>
                            <option value="1">Bread</option>    
                            <option value="2">Cakes</option> 
                            <option value="3">Cookies</option>  
                            <option value="4">Pastries</option>
                        </select>
                        <div id="errorContainer"></div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="brand" class="col-md-2 col-form-label control-label">Product Brand</label>
                    <div class="col-md-10">
                        <input name="brand" type="text" class="form-control" id="brand"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.product.brand.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                    <div class="col-md-10">                   
                        <textarea class="form-control" name="description" rows="3"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.product.description.required') }}" data-parsley-trigger="keyup"></textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="ingredients" class="col-md-2 col-form-label control-label">Ingredients</label>
                    <div class="col-md-10">                   
                        <textarea class="form-control" name="ingredients" rows="3"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.product.ingredients.required') }}" data-parsley-trigger="keyup"></textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="allergen" class="col-md-2 col-form-label control-label">Allergens</label>
                    <div class="col-md-10">
                        <input name="allergen" type="text" class="form-control" id="allergen"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.product.allergen.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="price" class="col-md-2 col-form-label control-label">Price (RM)</label>
                    <div class="col-md-10">
                        <input name="price" type="number" class="form-control" id="price" step="0.01"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.product.price.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label class="col-md-2 col-form-label control-label">Quantity</label>
                    <div class="col-md-3">
                        <input data-toggle="touchspin" type="text" name="quantity" class="form-control" value="0" style="text-align: center;">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save">@lang('button.save')</button>
                        <a href="{{ route('product.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                    </div>
                </div>

            </form>

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
<script src="{{ URL::asset('build/libs/dropzone/min/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('/build/js/pages/Product/form.js') }}"></script>
@endsection