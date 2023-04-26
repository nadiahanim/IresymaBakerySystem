

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Add New Recipe'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Add New Recipe <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('recipe.save')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?> 

                <div class="row mb-2">
                    <label for="title" class="col-md-2 col-form-label control-label">Title</label>
                    <div class="col-md-10">
                        <input name="title" type="text" class="form-control" id="title"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.recipe.title.required')); ?>" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                    <div class="col-md-10">                   
                        <textarea id="elm1" name="description"></textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="recipe_img" class="col-md-2 col-form-label control-label">Images</label>
                    <div class="col-md-10">
                        <input name="recipe_img[]" type="file" class="form-control" id="recipe_img" multiple>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save"><?php echo app('translator')->get('button.save'); ?></button>
                        <a href="<?php echo e(route('product.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                    </div>
                </div>

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
<!--tinymce js-->
<script src="build/libs/tinymce/tinymce.min.js"></script>
<!-- init js -->
<script src="build/js/pages/form-editor.init.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Recipe/create.blade.php ENDPATH**/ ?>