

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

        <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('bakery.update')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?> 
            <?php echo method_field('PATCH'); ?>

            <div class="row mb-2">
                <label for="name" class="col-md-2 col-form-label control-label">Bakery Name</label>
                <div class="col-md-10">
                    <input name="name" type="text" class="form-control" id="name" value="<?php echo e($bakery_data->bakery_name); ?>"
                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.bakery.name.required')); ?>" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="row mb-2">
                <label for="location" class="col-md-2 col-form-label control-label">Location</label>
                <div class="col-md-10">                   
                    <textarea class="form-control" name="location" rows="2"
                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.bakery.location.required')); ?>" data-parsley-trigger="keyup"><?php echo e($bakery_data->bakery_location); ?></textarea>
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone_no" class="col-md-2 col-form-label control-label">Telephone No.</label>
                <div class="col-md-10">
                    <input name="phone_no" type="text" class="form-control" id="phone_no"  value="<?php echo e($bakery_data->bakery_contact); ?>"
                    data-inputmask="'mask': '9', 'repeat': 11, 'greedy' : false"
                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.bakery.phone_no.required')); ?>" data-parsley-trigger="keyup">
                </div>
            </div>

            <div class="row mb-2">
                <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                <div class="col-md-10">                   
                    <textarea class="form-control" name="description" rows="3"
                    required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.bakery.description.required')); ?>" data-parsley-trigger="keyup"><?php echo e($bakery_data->bakery_desc); ?></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary float-end swal-update"><?php echo app('translator')->get('button.save'); ?></button>
                    <a href="<?php echo e(route('bakery.view')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Bakery/edit.blade.php ENDPATH**/ ?>