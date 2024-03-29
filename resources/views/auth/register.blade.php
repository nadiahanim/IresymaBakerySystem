@extends('layouts.master-without-nav')

@section('title')
@lang('pageTitle.register')
@endsection

@section('css')
<!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/build/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/build/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
@endsection

@section('body')

<body class="auth-body-bg">
    @endsection

    @section('content')

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-8">
                    <div class="auth-full-bg pt-lg-5 p-2">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">
                                                @foreach($five_star as $i => $data)
                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" {{$data->comment}} "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">{{$data->customer->fullname}}</h4>
                                                                    <p class="font-size-14 mb-0">- Customer</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-4">
                    <div class="auth-full-page-content p-md-4 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-3">
                                    <a href="index" class="d-block auth-logo">
                                        <img src="{{ URL::asset('/build/images/logo-bakery-home-2.png') }}" alt="" height="80" class="auth-logo-dark">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 style="color:#F2A0A0;">Hello there!</h5>
                                        <p class="text-muted">Sign up to get started!</p>
                                    </div>

                                    <div class="mt-4">
                                        <form id="form" data-parsley-validate class="form-horizontal" method="POST" action="{{ route('registerUser') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="name" class="col-form-label control-label">Name</label>
                                                <input name="name" type="text" class="form-control" id="name" placeholder="Name" 
                                                required data-parsley-required-message="* {{  Config::get('validationMessage.register.name.required') }}" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone_no" class="col-form-label control-label">Telephone No.</label>
                                                <input name="phone_no" type="text" class="form-control input-mask" id="phone_no" placeholder="0123456789" 
                                                data-inputmask="'mask': '9', 'repeat': 11, 'greedy' : false"
                                                required data-parsley-required-message="* {{  Config::get('validationMessage.register.phone_no.required') }}" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label for="address" class="col-form-label control-label">Home Address</label>
                                                <input name="address" type="text" class="form-control" id="address" placeholder="Home Address" 
                                                required data-parsley-required-message="* {{  Config::get('validationMessage.register.address.required') }}" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input name="email" type="email" class="form-control" id="email" placeholder="Email" 
                                                data-inputmask="'alias': 'email'" parsley-type="email" data-parsley-type-message="* {{  Config::get('validationMessage.register.email.email') }}"
                                                required data-parsley-required-message="* {{  Config::get('validationMessage.register.email.required') }}" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                                                    required data-parsley-required-message="* {{  Config::get('validationMessage.register.password.required') }}" data-parsley-trigger="keyup"
                                                    data-parsley-errors-container="#error"
                                                    onblur="validatePassword(this.id,'msg-password')" onkeyup="validatePassword(this.id,'msg-password')">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                <div id="error"></div>

                                                <span id="msg-password" style="font-size:93%" class="error">
                                                    <span id="minlength" class="invalid">{{ Config::get('validationMessage.register.password.digits') }}</span><br/>
                                                    <span id="uppercase" class="invalid">{{ Config::get('validationMessage.register.password.uppercase') }}</span><br/>
                                                    <span id="lowercase" class="invalid">{{ Config::get('validationMessage.register.password.lowercase') }}</span><br/>
                                                    <span id="number" class="invalid">{{ Config::get('validationMessage.register.password.number') }}</span><br/>
                                                    <span id="symbol" class="invalid">{{ Config::get('validationMessage.register.password.regex') }}</span>
                                                </span>

                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn waves-effect waves-light" id="registerButton" type="submit" style="background-color:#F2A0A0; color:white;">Sign Up</button>
                                            </div>

                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium" style="color:#F2A0A0;"> Login now </a> </p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    @endsection
    @section('script')
    <!-- owl.carousel js -->
    <script src="{{ URL::asset('/build/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- auth-2-carousel init -->
    <script src="{{ URL::asset('/build/js/pages/auth-2-carousel.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/User/register.js')}}"></script>
    @component('components.alert')@endcomponent
    @endsection
