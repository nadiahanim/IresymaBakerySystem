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

@component('components.breadcrumb')
@slot('title') Place An Order @endslot
@endcomponent

<div class="row">
    <div class="col-lg-12">
        <!-- <div class="card"> -->
            <!-- <div class="card-body"> -->
                <h4 id="display_price" class="card-title mb-4 text-end text-primary" style="font-size:25px;margin-top:10px;margin-right:10px;"></h4>

                <h4 id="display_deposit" class="card-title mb-4 text-end text-info" style="font-size:15px;margin-top:10px;margin-right:10px;"></h4>
        <!-- </div> -->
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Order Your Own Custom Cake</h4>
                <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="{{ route('order.save') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" id="total_price" name="total_price" class="form-control" step="0.01">
                <input type="hidden" id="deposit_price" name="deposit_price" class="form-control" step="0.01">
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
                                                        <input class="form-check-input" type="radio" required name="cake_shape" id="cake_shape" value="{{ $data->id }}" data-price="{{$data->price}}" {{ (($default_shape) == $data->id) ? 'checked' : ''; }}>
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
                                                        <input class="form-check-input" type="radio" required name="cake_flavour" id="cake_flavour" value="{{ $data->id }}" data-price="{{$data->price}}" {{ (($default_flavour) == $data->id) ? 'checked' : ''; }}>
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
                                                        <input class="form-check-input" type="radio" required name="cake_size" id="cake_size" value="{{ $data->id }}" data-price="{{$data->price}}" {{ (($default_size) == $data->id) ? 'checked' : ''; }}>
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
                                                        <input class="form-check-input" type="radio" required name="cake_cream" id="cake_cream" value="{{ $data->id }}" data-price="{{$data->price}}" {{ (($default_cream) == $data->id) ? 'checked' : ''; }}>
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
                                                        <input class="form-check-input" type="radio" required name="cake_tier" id="cake_tier" value="{{ $data->id }}" data-price="{{$data->price}}" {{ (($default_tier) == $data->id) ? 'checked' : ''; }}>
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
                                                        <input class="form-check-input" type="radio" required name="cake_deco" id="cake_deco" value="{{ $data->id }}" data-price="{{$data->price}}" {{ (($default_deco) == $data->id) ? 'checked' : ''; }}>
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
                                        <input type="file" class="form-control" id="sample_image" name="sample_image"
                                        required
                                        data-parsley-filemaxmegabytes="2"
                                        data-parsley-fileextension='png|jpeg|jpg' data-parsley-fileextension-message="* {{  Config::get('validationMessage.product.product_img.required') }}"
                                        data-parsley-filemaxmegabytes-message="* {{  Config::get('validationMessage.product.product_img.filemaxmegabytes') }}" 
                                        data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/jpg, image/png" 
                                        data-parsley-filemimetypes-message="* {{  Config::get('validationMessage.product.product_img.filemimetypes') }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="order_message">Special Message</label>
                                        <input type="text" class="form-control" id="special_message" name="special_message"
                                        required data-parsley-required-message="* {{  Config::get('validationMessage.order.special_message.required') }}" data-parsley-trigger="keyup">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="note">Important Note</label>
                                        <input type="text" class="form-control" id="note" name="note" value="Ref: {{$cake_name}}"
                                        required data-parsley-required-message="* {{  Config::get('validationMessage.order.note.required') }}" data-parsley-trigger="keyup">
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
                                                    <div class="mbsc-col-sm-10 mbsc-col-md-8" style="border-style:dashed; border-radius:25px; border-color:#54B4D3;">
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
                                            <input type="time" class="form-control" id="deli_time" name="deli_time" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="deli_address1">Address 1</label>
                                            <input type="text" class="form-control" id="deli_address1" name="deli_address1" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="cake_shape">Postcode</label>
                                            <!-- <div class="col-md-10"> -->
                                                <select class="form-select" id="deli_postcode" name="deli_postcode"
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
                                            <input type="text" class="form-control" id="deli_address2" name="deli_address2" required>
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
    $(function () {

        $("#basic-example").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slide"
        });

        var start = new Date();
        start.setDate(start.getDate() + 3); // the minimum delivery date is in 3 days

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
            min: start, 
            invalid: disableddates,
            headerText: 'You selected {value}'
        });

    });

    
</script>

<script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
<!-- form advanced init -->
<script src="{{ URL::asset('/build/js/pages/form-advanced.init.js') }}"></script>
<!-- form wizard init -->
<!-- <script src="{{ URL::asset('/build/js/pages/form-wizard.init.js') }}"></script> -->
<!-- jquery step -->
<script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ URL::asset('/build/js/pages/Order/orderForm.js') }}"></script>
@component('components.alert')@endcomponent
@endsection