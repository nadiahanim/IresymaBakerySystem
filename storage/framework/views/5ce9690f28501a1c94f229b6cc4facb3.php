

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

            <div class="row mb-2">
                <label for="name" class="col-md-2 col-form-label control-label">Name</label>
                <div class="col-md-10">
                    <input name="name" type="text" class="form-control" id="name" value="<?php echo e($user_data->fullname); ?>" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone" class="col-md-2 col-form-label control-label">Telephone No.</label>
                <div class="col-md-10">
                    <input name="phone" type="text" class="form-control" id="phone" value="<?php echo e($user_data->phone); ?>" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <label for="address" class="col-md-2 col-form-label control-label">Home Address</label>
                <div class="col-md-10">
                    <input name="address" type="text" class="form-control" id="address" value="<?php echo e($user_data->address); ?>" readonly>
                </div>
            </div>

            <div class="row mb-2">
                <label for="email" class="col-md-2 col-form-label control-label">Email</label>
                <div class="col-md-10">
                    <input name="email" type="text" class="form-control" id="email" value="<?php echo e($user_data->email); ?>" readonly>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary float-end"><?php echo app('translator')->get('button.update_profile'); ?></a>
                </div>
            </div>

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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Profile/view.blade.php ENDPATH**/ ?>