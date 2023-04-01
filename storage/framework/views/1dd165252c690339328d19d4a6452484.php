

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('My Bakery'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> My Bakery <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

        <div class="row mb-2">
                <label for="name" class="col-md-2 col-form-label control-label">Bakery Name</label>
                <div class="col-md-10">
                    <input name="name" type="text" class="form-control" id="name" value="<?php echo e($bakery_data->bakery_name); ?>" disabled>
                </div>
            </div>

            <div class="row mb-2">
                <label for="location" class="col-md-2 col-form-label control-label">Location</label>
                <div class="col-md-10">                   
                    <textarea class="form-control" name="location" rows="2" disabled><?php echo e($bakery_data->bakery_location); ?></textarea>
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone_no" class="col-md-2 col-form-label control-label">Telephone No.</label>
                <div class="col-md-10">
                    <input name="phone_no" type="text" class="form-control" id="phone_no"  value="<?php echo e($bakery_data->bakery_contact); ?>" disabled>
                </div>
            </div>

            <div class="row mb-2">
                <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                <div class="col-md-10">                   
                    <textarea class="form-control" name="description" rows="3" disabled><?php echo e($bakery_data->bakery_desc); ?></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="<?php echo e(route('bakery.edit')); ?>" class="btn btn-primary float-end">Edit</a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Bakery/view.blade.php ENDPATH**/ ?>