

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Calendar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/build/css//mobiscroll.javascript.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <script src="<?php echo e(URL::asset('build/js/mobiscroll.javascript.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Update Calendar <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('calendar.save')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?> 

                <input name="dates" type="hidden" class="form-control" id="dates" data-disablethese="<?php echo e(json_encode($disabled_dates)); ?>">

                <div class="mbsc-grid">
                    <div class="mbsc-row">
                        <div class="mbsc-col-sm-10 mbsc-col-md-5" style="border-style:dashed; border-radius:25px; border-color:#54B4D3;">
                            <div class="mbsc-form-group">
                                <!-- <div id="demo-counter"></div> -->
                                <input id="demo-counter" type="hidden" name="selected_dates"></input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save"><?php echo app('translator')->get('button.save'); ?></button>
                        <a href="<?php echo e(route('calendar.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    var today = new Date();
    var disableddates = $("#dates").data("disablethese");

        mobiscroll.setOptions({
        display: 'inline',
        theme: 'ios', 
        themeVariant: 'light'
    });

    var datepicker = mobiscroll.datepicker('#demo-counter', {
        controls: ['calendar'],
        display: 'inline',
        renderCalendarHeader: function () {
        return '<div mbsc-calendar-prev class="custom-prev"></div>' +
            '<div mbsc-calendar-nav class="custom-nav" style="width:90%; text-align: center;"></div>' +
            '<div mbsc-calendar-next class="custom-next"></div>';
    },
        min: today, 
        invalid: disableddates,
        selectMultiple: true,
        selectCounter: true,
        headerText: 'You selected {value}'
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Calendar/edit.blade.php ENDPATH**/ ?>