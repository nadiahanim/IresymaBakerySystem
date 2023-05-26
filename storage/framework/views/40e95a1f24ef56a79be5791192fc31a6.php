

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Give A Review'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- Bootstrap Rating css -->
<link href="<?php echo e(URL::asset('build/libs/bootstrap-rating/bootstrap-rating.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Give A Review <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('review.save')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?> 

                <input name="order_id" type="hidden" class="form-control" id="order_id" value="<?php echo e($order->id); ?>">

                <div class="row mb-2">
                    <label for="overall" class="col-md-2 col-form-label control-label">Overall</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="overall_stars" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="design" class="col-md-2 col-form-label control-label">Design</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="design_stars" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="taste" class="col-md-2 col-form-label control-label">Taste</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="taste_stars" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="service" class="col-md-2 col-form-label control-label">Service</label>
                    <div class="col-md-10">                   
                        <div class="rating-star">
                            <input type="hidden" class="rating" name="service_stars" data-filled="mdi mdi-heart text-danger" data-empty="mdi mdi-heart-outline text-danger"/>
                        </div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="comment" class="col-md-2 col-form-label control-label">Comment</label>
                    <div class="col-md-8">                   
                        <textarea class="form-control" name="comment" rows="4"></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save"><?php echo app('translator')->get('button.save'); ?></button>
                        <a href="<?php echo e(route('order.view', ['order_id'=>$order->id])); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- Bootstrap rating js -->
<script src="<?php echo e(URL::asset('build/libs/bootstrap-rating/bootstrap-rating.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('/build/js/pages/rating-init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Review/create.blade.php ENDPATH**/ ?>