

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('pageTitle.register'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/build/libs/owl.carousel/assets/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/build/libs/owl.carousel/assets/owl.theme.default.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<body class="auth-body-bg">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-8">
                    <div class="auth-full-bg pt-lg-5 p-2">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <!-- <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">

                                                <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary">5k</span>+ Satisfied clients</h4>

                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" Fantastic theme with a
                                                                    ton of options. If you just want the HTML to
                                                                    integrate with your project, then this is the
                                                                    package. You can find the files in the 'dist'
                                                                    folder...no need to install git and all the other
                                                                    stuff the documentation talks about. "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">Abs1981</h4>
                                                                    <p class="font-size-14 mb-0">- Skote User</p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" If Every Vendor on Envato
                                                                    are as supportive as Themesbrand, Development with
                                                                    be a nice experience. You guys are Wonderful. Keep
                                                                    us the good work. "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                    <p class="font-size-14 mb-0">- Skote User</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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
                                        <img src="<?php echo e(URL::asset('/build/images/logo-bakery-home-2.png')); ?>" alt="" height="80" class="auth-logo-dark">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 style="color:#F2A0A0;">Hello there!</h5>
                                        <p class="text-muted">Sign up to get started!</p>
                                    </div>

                                    <div class="mt-4">
                                        <?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>
                                        <form id="form" data-parsley-validate class="form-horizontal" method="POST" action="<?php echo e(route('registerUser')); ?>">
                                            <?php echo csrf_field(); ?>

                                            <div class="mb-3">
                                                <label for="name" class="col-form-label control-label">Name</label>
                                                <input name="name" type="text" class="form-control" id="name" placeholder="Name" 
                                                required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.register.name.required')); ?>" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone_no" class="col-form-label control-label">Telephone No.</label>
                                                <input name="phone_no" type="text" class="form-control input-mask" id="phone_no" placeholder="0123456789" 
                                                data-inputmask="'mask': '9', 'repeat': 11, 'greedy' : false"
                                                required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.register.phone_no.required')); ?>" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label for="address" class="col-form-label control-label">Home Address</label>
                                                <input name="address" type="text" class="form-control" id="address" placeholder="Home Address" 
                                                required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.register.address.required')); ?>" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input name="email" type="email" class="form-control" id="email" placeholder="Email" 
                                                data-inputmask="'alias': 'email'" parsley-type="email" data-parsley-type-message="* <?php echo e(Config::get('validationMessage.register.email.email')); ?>"
                                                required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.register.email.required')); ?>" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                                                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.register.password.required')); ?>" data-parsley-trigger="keyup"
                                                    data-parsley-errors-container="#error"
                                                    onblur="validatePassword(this.id,'msg-password')" onkeyup="validatePassword(this.id,'msg-password')">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                <div id="error"></div>

                                                <span id="msg-password" style="font-size:93%" class="error">
                                                    <span id="minlength" class="invalid"><?php echo e(Config::get('validationMessage.register.password.digits')); ?></span><br/>
                                                    <span id="uppercase" class="invalid"><?php echo e(Config::get('validationMessage.register.password.uppercase')); ?></span><br/>
                                                    <span id="lowercase" class="invalid"><?php echo e(Config::get('validationMessage.register.password.lowercase')); ?></span><br/>
                                                    <span id="number" class="invalid"><?php echo e(Config::get('validationMessage.register.password.number')); ?></span><br/>
                                                    <span id="symbol" class="invalid"><?php echo e(Config::get('validationMessage.register.password.regex')); ?></span>
                                                </span>

                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn waves-effect waves-light" type="submit" style="background-color:#F2A0A0; color:white;">Sign Up</button>
                                            </div>

                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Already have an account ? <a href="<?php echo e(route('login')); ?>" class="fw-medium" style="color:#F2A0A0;"> Login now </a> </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>
                                            document.write(new Date().getFullYear())
                                        </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                        Themesbrand</p>
                                </div> -->
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

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <!-- owl.carousel js -->
    <script src="<?php echo e(URL::asset('/build/libs/owl.carousel/owl.carousel.min.js')); ?>"></script>
    <!-- auth-2-carousel init -->
    <script src="<?php echo e(URL::asset('/build/js/pages/auth-2-carousel.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/User/register.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\BakerySystem\resources\views/auth/register.blade.php ENDPATH**/ ?>