

<?php $__env->startSection('title'); ?>
<?php echo e($product->product_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Product Details <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-xl-6">
                    <div class="row" style="display: flex; justify-content: center;align-items: center;">
                        <div class="px-5 py-5">
                        <?php if($product->image_path): ?>
                            <img width="200" src="<?php echo e(asset('storage/'.$product->image_path)); ?>" alt="<?php echo e($product->image_name); ?>" class="img-fluid mx-auto d-block">
                        <?php else: ?>
                        <img width="200" src="<?php echo e(URL::asset('build/images/tepung.png')); ?>" alt="No Image" class="img-fluid mx-auto d-block">
                        <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="mt-4 mt-xl-3">
                        <a href="javascript: void(0);" class="text-primary" style="pointer-events: none;">
                        <?php if($product->product_type == 1): ?>
                            Bread
                        <?php elseif($product->product_type == 2): ?>
                            Cakes
                        <?php elseif($product->product_type == 3): ?>
                            Cookies
                        <?php else: ?>
                            Pastries
                        <?php endif; ?>
                        </a>
                        <h4 class="mt-2 mb-3"><?php echo e($product->product_name); ?></h4>
                        <a href="javascript: void(0);" class="text-secondary" style="pointer-events: none;">Produced by <?php echo e($product->brand); ?></a>
                        <h5 class="mt-2 mb-4">Price : <b>MYR <?php echo e($product->price); ?></b></h5>
                        <p class="text-muted mb-4"><?php echo e($product->description); ?></p>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div>
                                    <p class="text-muted"><i class="bx bx-food-menu font-size-16 align-middle text-primary me-1"></i><?php echo e($product->ingredients); ?></p>
                                    <p class="text-muted"><i class="bx bx-dizzy font-size-16 align-middle text-danger me-1"></i><?php echo e($product->allergen); ?></p>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-1 mb-4"><span class="text-muted me-2"></span>Availability :
                            <?php if($product->quantity == 0): ?>
                                <b style="color:red">Sold Out</b>
                            <?php elseif($product->quantity < 3): ?>
                                <b style="color:red">Only <?php echo e($product->quantity); ?> left</b>
                            <?php else: ?>
                                <b><?php echo e($product->quantity); ?></b>
                            <?php endif; ?>
                        </h5>
                        <p class="my-0"><span class="text-muted me-2"></span>last updated: <?php echo e(date('d/m/Y h:i a', strtotime($product->updated_on))); ?></p>
                    </div>
                </div>
            </div>

            <?php if(isset(Auth::user()->user_type) && Auth::user()->user_type == 1): ?>
            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="<?php echo e(route('product.edit', ['product_id'=> $product->id])); ?>" class="btn btn-primary float-end">Edit</a>
                    <a href="<?php echo e(route('product.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                </div>
            </div>
            <?php else: ?>
            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="<?php echo e(route('product.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')); ?>"></script>
<script>
    $("input[name='quantity']").TouchSpin({
        min: 0,
        max: 600,
        step: 1,
    });
</script>
<!-- form advanced init -->
<script src="<?php echo e(URL::asset('/build/js/pages/form-advanced.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/build/js/pages/Product/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Product/view.blade.php ENDPATH**/ ?>