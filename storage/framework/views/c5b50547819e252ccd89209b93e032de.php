

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('pageTitle.user_profile'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Your Profile <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

        <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?> 
            <?php echo method_field('PATCH'); ?>

            <div class="row mb-2">
                <label for="name" class="col-md-2 col-form-label control-label">Name</label>
                <div class="col-md-10">
                    <input name="name" type="text" class="form-control" id="name" value="<?php echo e($user_data->fullname); ?>"
                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.profile.name.required')); ?>" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone_no" class="col-md-2 col-form-label control-label">Telephone No.</label>
                <div class="col-md-10">
                    <input name="phone_no" type="text" class="form-control" id="phone_no" value="<?php echo e($user_data->phone); ?>"
                    data-inputmask="'mask': '9', 'repeat': 11, 'greedy' : false"
                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.profile.phone_no.required')); ?>" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="row mb-2">
                <label for="address" class="col-md-2 col-form-label control-label">Home Address</label>
                <div class="col-md-10">
                    <input name="address" type="text" class="form-control" id="address" value="<?php echo e($user_data->address); ?>"
                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.profile.address.required')); ?>" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-md-2 col-form-label control-label">Email</label>
                <div class="col-md-10">
                    <input name="email" type="email" class="form-control" id="email" value="<?php echo e($user_data->email); ?>"
                    data-inputmask="'alias': 'email'" parsley-type="email" data-parsley-type-message="* <?php echo e(Config::get('validationMessage.profile.email.email')); ?>"
                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.profile.email.required')); ?>" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary float-end swal-update"><?php echo app('translator')->get('button.save'); ?></button>
                    <a href="<?php echo e(route('profile.view')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                </div>
            </div>

        </form>

        </div>
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('/build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('build/js/pages/dashboard.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Profile/edit.blade.php ENDPATH**/ ?>