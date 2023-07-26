@extends('layouts.master')

@section('title')
@lang('Add New Question')
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

@component('components.breadcrumb')
@slot('title') Add New Question @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('faq.save') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Question</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="question" rows="3"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.faq.question.required') }}" data-parsley-trigger="keyup"></textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Answer</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="answer" rows="5"
                        required data-parsley-required-message="* {{  Config::get('validationMessage.faq.answer.required') }}" data-parsley-trigger="keyup"></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save">@lang('button.save')</button>
                        <a href="{{ route('faq.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
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