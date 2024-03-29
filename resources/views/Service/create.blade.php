@extends('layouts.master')

@section('title')
@lang('Add New Price')
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('title') Add New Price @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('service.save') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                            
                <div class="mb-2 row">
                    <label for="service_category" class="col-md-2 col-form-label control-label">Category</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="service_category" name="service_category"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.service.category.required') }}" data-parsley-trigger="change">
                            <option value="">-- Select --</option>
                            @foreach($categories as $i => $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Name</label>
                    <div class="col-md-10">
                        <input name="name" type="text" class="form-control" id="name"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.service.name.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="price" class="col-md-2 col-form-label control-label">Price (RM)</label>
                    <div class="col-md-10">
                        <input name="price" type="number" class="form-control" id="price" step="0.01"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.service.price.required') }}" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save">@lang('button.save')</button>
                        <a href="{{ route('service.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
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
<!-- form advanced init -->
<script src="{{ URL::asset('/build/js/pages/form-advanced.init.js') }}"></script>
@component('components.alert')@endcomponent
@endsection