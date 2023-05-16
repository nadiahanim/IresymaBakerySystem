@extends('layouts.master')

@section('title')
@lang('Place An Order')
@endsection

@section('css')
    <link href="{{ URL::asset('/build/css//mobiscroll.javascript.min.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ URL::asset('build/js/mobiscroll.javascript.min.js')}}"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
@endsection

@section('content')

@component('components.alert')@endcomponent

@component('components.breadcrumb')
@slot('title') Place An Order @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Order Your Own Custom Cake</h4>
                <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div id="basic-example">
                    <!-- Cake Details -->
                    <h3>Cake Details</h3>
                    <section>
                        
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input" class="fw-semibold">Cake Shape</label>
                                        <div class="col-md-10">
                                                @foreach($shape as $i => $data)
                                                    <div class="form-check form-radio-info mb-3">
                                                        <input class="form-check-input" type="radio" name="cake_shape" id="cake_shape" value="{{ $data->id }}" data-price="{{$data->price}}">
                                                        <label class="form-check-label" for="cake_shape">
                                                            {{ $data->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            <div id="errorContainer1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="mb-3">
                                        <label for="basicpill-firstname-input" class="fw-semibold">Cake Flavour</label>
                                        <div class="col-md-10">
                                                @foreach($flavour as $i => $data)
                                                    <div class="form-check form-radio-primary mb-3">
                                                        <input class="form-check-input" type="radio" name="cake_flavour" id="cake_flavour" value="{{ $data->id }}" data-price="{{$data->price}}">
                                                        <label class="form-check-label" for="cake_flavour">
                                                            {{ $data->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            <div id="errorContainer2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-phoneno-input" class="fw-semibold">Cake Size</label>
                                        <div class="col-md-10">
                                                @foreach($size as $i => $data)
                                                    <div class="form-check form-radio-primary mb-3">
                                                        <input class="form-check-input" type="radio" name="cake_size" id="cake_size" value="{{ $data->id }}" data-price="{{$data->price}}">
                                                        <label class="form-check-label" for="cake_size">
                                                            {{ $data->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            <div id="errorContainer2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input" class="fw-semibold">Cream Flavour</label>
                                        <div class="col-md-10">
                                                @foreach($cream as $i => $data)
                                                    <div class="form-check form-radio-info mb-3">
                                                        <input class="form-check-input" type="radio" name="cake_cream" id="cake_cream" value="{{ $data->id }}" data-price="{{$data->price}}">
                                                        <label class="form-check-label" for="cake_cream">
                                                            {{ $data->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            <div id="errorContainer1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input" class="fw-semibold">No. of Tier</label>
                                        <div class="col-md-10">
                                                @foreach($tier as $i => $data)
                                                    <div class="form-check form-radio-info mb-3">
                                                        <input class="form-check-input" type="radio" name="cake_tier" id="cake_tier" value="{{ $data->id }}" data-price="{{$data->price}}">
                                                        <label class="form-check-label" for="cake_tier">
                                                            {{ $data->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            <div id="errorContainer1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </section>

                    <!-- Cake Design -->
                    <h3>Cake Design</h3>
                    <section>
                        <!-- <form> -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input" class="fw-semibold">Cake Decoration</label>
                                        <div class="col-md-10">
                                                @foreach($deco as $i => $data)
                                                    <div class="form-check form-radio-info mb-3">
                                                        <input class="form-check-input" type="radio" name="cake_deco" id="cake_deco" value="{{ $data->id }}" data-price="{{$data->price}}">
                                                        <label class="form-check-label" for="cake_deco">
                                                            {{ $data->name }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                            <div id="errorContainer1"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-vatno-input">Sample Design</label>
                                        <input type="file" class="form-control" id="order_image" multiple>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="order_message">Special Message</label>
                                        <input type="text" class="form-control" id="order_message" name="order_message">
                                    </div>
                                </div>
                            </div>
                        <!-- </form> -->
                    </section>

                    <!-- Delivery Details -->
                    <h3>Delivery Details</h3>
                    <section>
                        <div>
                            <!-- <form> -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <input name="dates" type="hidden" class="form-control" id="dates" data-disablethese="{{ json_encode($disabled_dates) }}">
                                        <label for="deli_address2">Delivery Date</label>
                                            <!-- <input type="text" class="form-control" id="deli_address2" name="deli_address2"> -->
                                            <div class="mbsc-grid">
                                                <div class="mbsc-row">
                                                    <div class="mbsc-col-sm-10 mbsc-col-md-5" style="border-style:dashed; border-radius:25px; border-color:#54B4D3;">
                                                        <div class="mbsc-form-group">
                                                            <!-- <div id="demo-counter"></div> -->
                                                            <input id="deli_date" type="hidden" name="deli_date"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="deli_time">Delivery Time</label>
                                            <input type="time" class="form-control" id="deli_time" name="deli_time">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="deli_address1">Address 1</label>
                                            <input type="text" class="form-control" id="deli_address1" name="deli_address1">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="cake_shape">Postcode</label>
                                            <!-- <div class="col-md-10"> -->
                                                <select class="form-select" id="order_postcode" name="order_postcode"
                                                required data-parsley-required-message="* {{  Config::get('validationMessage.order.postcode.required') }}" data-parsley-trigger="change"
                                                data-parsley-errors-container="#errorContainer1">
                                                    <option value="" data-price="0">-- Select --</option>
                                                    @foreach($postcode as $i => $data)
                                                        <option value="{{$data->id}}" data-price="{{$data->price}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div id="errorContainer1"></div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                        <label for="deli_address2">Address 2</label>
                                            <input type="text" class="form-control" id="deli_address2" name="deli_address2">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-card-verification-input">Telephone Number</label>
                                            <input type="text" class="form-control" id="basicpill-card-verification-input" placeholder="Credit Verification Number">
                                        </div>
                                    </div>
                                </div>
                                
                            <!-- </form> -->
                        </div>
                    </section>

                    <!-- Checkout -->
                    <h3>Checkout</h3>
                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                    </div>
                                    <div>
                                        <h5>Confirm Detail</h5>
                                        <p class="text-muted">Before checking out, please recheck the order details</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </form>
                </div>

            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
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

    var datepicker = mobiscroll.datepicker('#deli_date', {
        controls: ['calendar'],
        display: 'inline',
        renderCalendarHeader: function () {
        return '<div mbsc-calendar-prev class="custom-prev"></div>' +
            '<div mbsc-calendar-nav class="custom-nav" style="width:90%; text-align: center;"></div>' +
            '<div mbsc-calendar-next class="custom-next"></div>';
        },
        min: today, 
        invalid: disableddates,
        headerText: 'You selected {value}'
    });
</script>

<script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
<!-- form advanced init -->
<!-- <script src="{{ URL::asset('/build/js/pages/form-advanced.init.js') }}"></script> -->
<!-- form wizard init -->
<script src="{{ URL::asset('/build/js/pages/form-wizard.init.js') }}"></script>
<!-- jquery step -->
<script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

@endsection