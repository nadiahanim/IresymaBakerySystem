

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Cake Catalogue'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Our Best Cake Design <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<style>
    #cakecard {
        cursor: pointer;
    }
</style>

<div class="row">
<?php if(isset(Auth::user()->user_type) && Auth::user()->user_type == 1): ?>
    <div class="row mb-2">
        <div class="col-sm-11 offset-sm-1">
            <a type="button" href="<?php echo e(route('cake.create')); ?>" class="btn float-end waves-effect waves-light" style="background-color:#F2A0A0;color:white;">Add New Cake</a>
        </div>
    </div>
<?php else: ?>
<?php endif; ?>

    <div class="card-body">
        <div class="row" id="product-list">
            <?php $__currentLoopData = $cakes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-2" id="cakecard" onclick="window.location.href='<?php echo e(route('cake.view', ['cake_id'=> $data->id])); ?>';">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-4 text-center">
                        <h5 class="mb-3 text-truncate"><a href="<?php echo e(route('cake.view', ['cake_id'=> $data->id])); ?>" class="text-dark" style="overflow-wrap: break-word;"><?php echo e($data->name); ?></a></h5>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Cake/index.blade.php ENDPATH**/ ?>