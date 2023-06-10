

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Add New Question'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Add New Question <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('faq.save')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?> 

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Question</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="question" rows="3"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.faq.question.required')); ?>" data-parsley-trigger="keyup"></textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Answer</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="answer" rows="5"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.faq.answer.required')); ?>" data-parsley-trigger="keyup"></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save"><?php echo app('translator')->get('button.save'); ?></button>
                        <a href="<?php echo e(route('faq.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Faq/create.blade.php ENDPATH**/ ?>