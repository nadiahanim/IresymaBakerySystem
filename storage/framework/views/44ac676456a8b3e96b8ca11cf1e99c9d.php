

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Edit FAQ'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Edit FAQ <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('faq.update')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo method_field('PATCH'); ?> 

                <input name="faq_id" type="hidden" class="form-control" id="faq_id" value="<?php echo e($faq->id); ?>">
                            
                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Question</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="question" rows="3"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.faq.question.required')); ?>" data-parsley-trigger="keyup"><?php echo e($faq->question); ?></textarea>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Answer</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="answer" rows="5"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.faq.answer.required')); ?>" data-parsley-trigger="keyup"><?php echo e($faq->answer); ?></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-update"><?php echo app('translator')->get('button.save'); ?></button>
                        <a class="btn btn-danger float-end me-2 swal-delete"><?php echo app('translator')->get('button.delete'); ?></a>
                        <a href="<?php echo e(route('faq.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                    </div>
                </div>

            </form>

            <form id="delete-form" method="POST" action="<?php echo e(route('faq.delete')); ?>">
                <?php echo e(csrf_field()); ?> 
                <?php echo e(method_field('DELETE')); ?>

                <input name="faq_id" type="hidden" class="form-control" id="faq_id" value="<?php echo e($faq->id); ?>">
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Faq/edit.blade.php ENDPATH**/ ?>