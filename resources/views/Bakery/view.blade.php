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

        <div class="row mb-2">
                <label for="name" class="col-md-2 col-form-label control-label">Bakery Name</label>
                <div class="col-md-10">
                    <input name="name" type="text" class="form-control" id="name" value="{{ $bakery_data->bakery_name }}" disabled>
                </div>
            </div>

            <div class="row mb-2">
                <label for="location" class="col-md-2 col-form-label control-label">Location</label>
                <div class="col-md-10">                   
                    <textarea class="form-control" name="location" rows="2" disabled>{{ $bakery_data->bakery_location }}</textarea>
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone_no" class="col-md-2 col-form-label control-label">Telephone No.</label>
                <div class="col-md-10">
                    <input name="phone_no" type="text" class="form-control" id="phone_no"  value="{{ $bakery_data->bakery_contact }}" disabled>
                </div>
            </div>

            <div class="row mb-2">
                <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                <div class="col-md-10">                   
                    <textarea class="form-control" name="description" rows="3" disabled>{{ $bakery_data->bakery_desc }}</textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="{{ route('bakery.edit') }}" class="btn btn-primary float-end">Edit</a>
                </div>
            </div>

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