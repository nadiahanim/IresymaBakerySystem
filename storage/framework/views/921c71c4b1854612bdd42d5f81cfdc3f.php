

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('My Products'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> My Products <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<style>
    #productcard {
        cursor: pointer;
    }
</style>

<div class="row">

    <div class="row mb-2">
        <div class="col-sm-11 offset-sm-1">
            <a type="button" href="<?php echo e(route('product.create')); ?>" class="btn float-end waves-effect waves-light" style="background-color:#F2A0A0;color:white;">Add New Product</a>
        </div>
    </div>

    <div class="card-body">
        <div class="row" id="product-list">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-2" id="productcard" onclick="window.location.href='<?php echo e(route('product.view', ['product_id'=> $data->id])); ?>';">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4 text-center">
                            <h5 class="mb-3 text-truncate"><a href="<?php echo e(route('product.view', ['product_id'=> $data->id])); ?>" class="text-dark" style="overflow-wrap: break-word;"><?php echo e($data->product_name); ?></a></h5>
                        </div>
                        <div class="product-img position-relative">
                            <?php if($data->image_path): ?>
                            <img width="200" src="<?php echo e(asset('storage/'.$data->image_path)); ?>" alt="<?php echo e($data->image_name); ?>"
                                class="img-fluid mx-auto d-block">
                            <?php else: ?>
                            <img width="200" src="<?php echo e(URL::asset('build/images/tepung.png')); ?>" alt="No Image"
                                class="img-fluid mx-auto d-block">
                            <?php endif; ?>
                        </div>

                        <div class="mt-4 text-center">
                            <h5 class="my-0"><span class="text-muted me-2"></span> <b>MYR <?php echo e($data->price); ?></b></h5>
                            <h5 class="my-0"><span class="text-muted me-2"></span>Availability:
                                <?php if($data->quantity == 0): ?>
                                    <b style="color:red">Sold Out</b>
                                <?php elseif($data->quantity < 3): ?>
                                    <b style="color:red">Only <?php echo e($data->quantity); ?> left</b>
                                <?php else: ?>
                                    <b><?php echo e($data->quantity); ?></b>
                                <?php endif; ?>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Product/index.blade.php ENDPATH**/ ?>