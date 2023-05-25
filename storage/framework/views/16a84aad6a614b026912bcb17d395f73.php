

<?php $__env->startSection('title'); ?>
<?php echo e($cake->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&display=swap" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Our Best Cake Design <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <div class="row">

                <div class="col-xl-2">
                    <div class="mt-4 mt-xl-3">
                        <a href="javascript: void(0);" class="text-primary" style="pointer-events: none;">
 
                        </a>
                        <h1 class="mt-2 mb-3" style="font-family: 'Tangerine', cursive; font-size:600%; "><?php echo e($cake->name); ?></h1>
                        
                        <h5 class="mt-2 mb-4" style="text-align: center;"><b>MYR <?php echo e($cake->price); ?></b></h5>

                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="row" style="display: flex; justify-content: center;align-items: center;">
                        <div class="px-6 py-6">
                        <?php if($cake->image_path): ?>
                            <img width="300" src="<?php echo e(asset('storage/'.$cake->image_path)); ?>" alt="<?php echo e($cake->image_name); ?>" class="img-fluid mx-auto d-block">
                        <?php else: ?>
                        <img width="300" src="<?php echo e(URL::asset('build/images/tepung.png')); ?>" alt="No Image" class="img-fluid mx-auto d-block">
                        <?php endif; ?>
                        </div>
                    </div>
                </div>

                

                <div class="col-xl-5">
                    <div class="mt-4">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                        Description
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-muted"><?php echo e($cake->description); ?></div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        How to Order
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-muted">
                                        <p>Cake Shape: <?php echo e($cake->cakeShape->name); ?><p>
                                        <p>Cake Flavour: <?php echo e($cake->cakeFlavour->name); ?><p>
                                        <p>Cream Flavour: <?php echo e($cake->creamFlavour->name); ?><p>
                                        <p>Cake Size: <?php echo e($cake->cakeSize->name); ?><p>
                                        <p>Tier No.: <?php echo e($cake->cakeTier->name); ?><p>
                                        <p>Decoration: <?php echo e($cake->cakeDeco->name); ?><p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion -->
                    </div>
                </div>

            </div>

            <?php if(isset(Auth::user()->user_type) && Auth::user()->user_type == 1): ?>
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <a href="<?php echo e(route('cake.edit', ['cake_id'=> $cake->id])); ?>" class="btn btn-primary float-end">Edit</a>
                    <a href="<?php echo e(route('cake.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                </div>
            </div>
            <?php elseif(isset(Auth::user()->user_type) && Auth::user()->user_type == 2): ?>
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <a href="<?php echo e(route('order.create', [
                        'cake_name'=>$cake->name,
                        'default_shape'=>$cake->shape_id,
                        'default_flavour'=>$cake->flavour_id,
                        'default_cream'=>$cake->cream_id,
                        'default_size'=>$cake->size_id,
                        'default_tier'=>$cake->tier_id,
                        'default_deco'=>$cake->deco_id
                        ])); ?>" class="btn btn-primary float-end">Order Now</a>
                    <a href="<?php echo e(route('cake.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                </div>
            </div>
            <?php else: ?>
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary float-end">Order Now</a>
                    <a href="<?php echo e(route('cake.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
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
<!-- form advanced init -->
<script src="<?php echo e(URL::asset('/build/js/pages/form-advanced.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/build/js/pages/Product/form.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Cake/view.blade.php ENDPATH**/ ?>