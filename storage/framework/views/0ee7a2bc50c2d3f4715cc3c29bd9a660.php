

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Edit Price'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Edit Price <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('service.update')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo method_field('PATCH'); ?> 

                <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($service->id); ?>">
                            
                <div class="mb-2 row">
                    <label for="service_category" class="col-md-2 col-form-label control-label">Category</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="service_category" name="service_category"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.service.category.required')); ?>" data-parsley-trigger="change">
                            <option value="">-- Select --</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" <?php echo e((old('service_category', $service->category_id) == $data->id) ? 'selected' : ''); ?>><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Name</label>
                    <div class="col-md-10">
                        <input name="name" type="text" class="form-control" id="name" value="<?php echo e($service->name); ?>"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.service.name.required')); ?>" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="price" class="col-md-2 col-form-label control-label">Price (RM)</label>
                    <div class="col-md-10">
                        <input name="price" type="number" class="form-control" id="price" step="0.01" value="<?php echo e($service->price); ?>"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.service.price.required')); ?>" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-update"><?php echo app('translator')->get('button.save'); ?></button>
                        <a class="btn btn-danger float-end me-2 swal-delete"><?php echo app('translator')->get('button.delete'); ?></a>
                        <a href="<?php echo e(route('service.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                    </div>
                </div>

            </form>

            <form id="delete-form" method="POST" action="<?php echo e(route('service.delete')); ?>">
                <?php echo e(csrf_field()); ?> 
                <?php echo e(method_field('DELETE')); ?>

                <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($service->id); ?>">
            </form>

        </div>
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>
<!-- form advanced init -->
<script src="<?php echo e(URL::asset('/build/js/pages/form-advanced.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Service/edit.blade.php ENDPATH**/ ?>