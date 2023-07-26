<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('pageTitle.login'); ?>
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

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">
                                                <?php $__currentLoopData = $five_star; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" <?php echo e($data->comment); ?> "</p>

                                                                <div>
                                                                    <h4 class="font-size-16 text-primary"><?php echo e($data->customer->fullname); ?></h4>
                                                                    <p class="font-size-14 mb-0">- Customer</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-3">
                                    <a href="index" class="d-block auth-logo">
                                        <img src="<?php echo e(URL::asset('/build/images/logo-bakery-home-2.png')); ?>" alt="" height="80" class="auth-logo-dark">
                                    </a>
                                </div>
                                <div class="my-auto">

                                    <div>
                                        <h5 style="color:#F2A0A0;">Welcome Back!</h5>
                                        <p class="text-muted">Sign in to continue to Iresyma Bakery.</p>
                                    </div>

                                    <div class="mt-4">
                                        <?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>
                                        <form id="form" data-parsley-validate class="form-horizontal" method="POST" action="<?php echo e(route('loginCheck')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Email</label>
                                                <input name="email" type="email" class="form-control" id="username" placeholder="Email" 
                                                required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.login.email.required')); ?>" data-parsley-trigger="keyup">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Password"
                                                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.login.password.required')); ?>" data-parsley-trigger="keyup"
                                                    data-parsley-errors-container="#error">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                <div id="error"></div>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn waves-effect waves-light" type="submit" style="background-color:#F2A0A0; color:white;">Log
                                                    In</button>
                                            </div>

                                        </form>
                                        <div class="mt-5 text-center">
                                            <p>Don't have an account ? <a href="<?php echo e(route('register')); ?>" class="fw-medium" style="color:#F2A0A0;"> Signup now </a> </p>
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

    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <!-- owl.carousel js -->
    <script src="<?php echo e(URL::asset('/build/libs/owl.carousel/owl.carousel.min.js')); ?>"></script>
    <!-- auth-2-carousel init -->
    <script src="<?php echo e(URL::asset('/build/js/pages/auth-2-carousel.init.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/auth/login.blade.php ENDPATH**/ ?>