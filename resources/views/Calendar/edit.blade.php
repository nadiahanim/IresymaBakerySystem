@extends('layouts.master')

@section('title')
@lang('Calendar')
@endsection

@section('css')
    <link href="{{ URL::asset('/build/css//mobiscroll.javascript.min.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ URL::asset('build/js/mobiscroll.javascript.min.js')}}"></script>
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Update Calendar @endslot
@endcomponent

<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('calendar.save') }}" enctype="multipart/form-data">
                {{ csrf_field() }} 

                <input name="dates" type="hidden" class="form-control" id="dates" data-disablethese="{{ json_encode($disabled_dates) }}">

                <div class="mbsc-grid">
                    <div class="mbsc-row">
                        <div class="mbsc-col-sm-10 mbsc-col-md-5" style="border-style:dashed; border-radius:25px; border-color:#54B4D3;">
                            <div class="mbsc-form-group">
                                <!-- <div id="demo-counter"></div> -->
                                <input id="demo-counter" type="hidden" name="selected_dates"></input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save">@lang('button.save')</button>
                        <a href="{{ route('calendar.index') }}" class="btn btn-secondary float-end me-2">@lang('button.back')</a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('script')
<script>
    var today = new Date();
    var disableddates = $("#dates").data("disablethese");

        mobiscroll.setOptions({
        display: 'inline',
        theme: 'ios', 
        themeVariant: 'light'
    });

    var datepicker = mobiscroll.datepicker('#demo-counter', {
        controls: ['calendar'],
        display: 'inline',
        renderCalendarHeader: function () {
        return '<div mbsc-calendar-prev class="custom-prev"></div>' +
            '<div mbsc-calendar-nav class="custom-nav" style="width:90%; text-align: center;"></div>' +
            '<div mbsc-calendar-next class="custom-next"></div>';
    },
        min: today, 
        invalid: disableddates,
        selectMultiple: true,
        selectCounter: true,
        headerText: 'You selected {value}'
    });

</script>

@endsection