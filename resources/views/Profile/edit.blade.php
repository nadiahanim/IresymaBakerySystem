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

        <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            {{ csrf_field() }} 
            @method('PATCH')

            <div class="row mb-2">
                <label for="name" class="col-md-2 col-form-label control-label">Name</label>
                <div class="col-md-10">
                    <input name="name" type="text" class="form-control" id="name" value="{{ $user_data->fullname }}"
                    required data-parsley-required-message="* {{  Config::get('validationMessage.profile.name.required') }}" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone_no" class="col-md-2 col-form-label control-label">Telephone No.</label>
                <div class="col-md-10">
                    <input name="phone_no" type="text" class="form-control" id="phone_no" value="{{ $user_data->phone }}"
                    data-inputmask="'mask': '9', 'repeat': 11, 'greedy' : false"
                    required data-parsley-required-message="* {{  Config::get('validationMessage.profile.phone_no.required') }}" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="row mb-2">
                <label for="address" class="col-md-2 col-form-label control-label">Home Address</label>
                <div class="col-md-10">
                    <input name="address" type="text" class="form-control" id="address" value="{{ $user_data->address }}"
                    required data-parsley-required-message="* {{  Config::get('validationMessage.profile.address.required') }}" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-md-2 col-form-label control-label">Email</label>
                <div class="col-md-10">
                    <input name="email" type="email" class="form-control" id="email" value="{{ $user_data->email }}"
                    data-inputmask="'alias': 'email'" parsley-type="email" data-parsley-type-message="* {{  Config::get('validationMessage.profile.email.email') }}"
                    required data-parsley-required-message="* {{  Config::get('validationMessage.profile.email.required') }}" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary float-end swal-update">@lang('button.save')</button>
                    <a href="{{ route('profile.view') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
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