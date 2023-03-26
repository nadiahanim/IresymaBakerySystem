@extends('layouts.master')

@section('title')
@lang('pageTitle.user_profile')
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Your Profile @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <div class="row mb-2">
                <label for="name" class="col-md-2 col-form-label control-label">Name</label>
                <div class="col-md-10">
                    <input name="name" type="text" class="form-control" id="name" value="{{ $user_data->fullname }}" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone" class="col-md-2 col-form-label control-label">Telephone No.</label>
                <div class="col-md-10">
                    <input name="phone" type="text" class="form-control" id="phone" value="{{ $user_data->phone }}" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <label for="address" class="col-md-2 col-form-label control-label">Home Address</label>
                <div class="col-md-10">
                    <input name="address" type="text" class="form-control" id="address" value="{{ $user_data->address }}" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-md-2 col-form-label control-label">Email</label>
                <div class="col-md-10">
                    <input name="email" type="text" class="form-control" id="email" value="{{ $user_data->email }}" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary float-end">@lang('button.update_profile')</a>
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