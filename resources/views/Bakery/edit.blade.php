@extends('layouts.master')

@section('title')
@lang('My Bakery')
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
                    <a href="{{ route('bakery.view') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                </div>
            </div>

        </form>

        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('/build/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- dashboard init -->
<script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>
@endsection