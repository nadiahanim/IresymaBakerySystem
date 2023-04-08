@extends('layouts.master')

@section('title')
@lang('My Bakery')
@endsection

@section('css')
    <!-- Plugins css -->
    <link href="{{ URL::asset('build/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> -->

@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') My Bakery @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('bakery.update') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                @method('PATCH')

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Bakery Name</label>
                    <div class="col-md-10">
                        <input name="name" type="text" class="form-control" id="name" value="{{ $bakery_data->bakery_name }}"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.bakery.name.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="location" class="col-md-2 col-form-label control-label">Location</label>
                    <div class="col-md-10">                   
                        <textarea class="form-control" name="location" rows="2"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.bakery.location.required') }}" data-parsley-trigger="keyup">{{ $bakery_data->bakery_location }}</textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="phone_no" class="col-md-2 col-form-label control-label">Telephone No.</label>
                    <div class="col-md-10">
                        <input name="phone_no" type="text" class="form-control" id="phone_no"  value="{{ $bakery_data->bakery_contact }}"
                        data-inputmask="'mask': '9', 'repeat': 11, 'greedy' : false"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.bakery.phone_no.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                    <div class="col-md-10">                   
                        <textarea class="form-control" name="description" rows="3"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.bakery.description.required') }}" data-parsley-trigger="keyup">{{ $bakery_data->bakery_desc }}</textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-update">@lang('button.save')</button>
                        <!-- <a href="{{ route('bakery.view') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a> -->
                    </div>
                </div>

            </form>

            <h4 class="card-title mb-3">Bakery Images</h4>
            <!-- <form id="upload-image" class="dropzone" action="{{ route('bakery.updateImage') }}" enctype="multipart/form-data">
            {{ csrf_field() }} 
            
                <div class="fallback">
                    <input name="file" type="file" multiple="multiple">
                </div>

                <div class="dz-message needsclick" id="image-dropzone">
                    <div class="mb-3">
                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                    </div>

                    <h4>Drop files here or click to upload.</h4>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end">Upload Image</button>
                    </div>
                </div>

            </form> -->

            <form action="{{ route('bakery.updateImage') }}" method="post" class="dropzone" enctype="multipart/form-data">
                @csrf
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>

                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                            </div>

                            <h4>Drop files here or click to upload.</h4>
                        </div>
                    </form>

            <div class="mb-3 pt-2 row">
                <div class="col-sm-12">
                    <a href="{{ route('bakery.view') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end row -->


@endsection

@section('script')
    
    <!-- Plugins js -->
    <script src="{{ URL::asset('build/libs/dropzone/min/dropzone.min.js') }}"></script>

@endsection