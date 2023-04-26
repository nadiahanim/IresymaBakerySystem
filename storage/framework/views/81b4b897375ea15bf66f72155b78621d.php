

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Our Bakery'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Our Bakery <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">

        <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"><?php echo e($bakery_data->bakery_name); ?></h4>

                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="<?php echo e(URL::asset('/build/images/bakery.jpg')); ?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="<?php echo e(URL::asset('/build/images/logo-bakery.png')); ?>" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="<?php echo e(URL::asset('/build/images/bakery.jpg')); ?>" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

            <div class="row mb-2">
                <div class="col-md-10">
                    <div>
                        <p class="text-muted"><i class="bx bx-map-pin font-size-16 align-middle text-primary me-1"></i><?php echo e($bakery_data->bakery_location); ?></p>
                        <p class="text-muted"><i class="bx bx-phone font-size-16 align-middle text-danger me-1"></i><?php echo e($bakery_data->bakery_contact); ?></p>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-10">                   
                    <?php echo $bakery_data->bakery_desc; ?>

                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-10">                   
                    <input type="checkbox" id="switch3" switch="bool" name="operation" disabled <?php echo e((($bakery_data->bakery_operation) == 1) ? 'checked' : ''); ?>/>
                    <label for="switch3" data-on-label="Open" data-off-label="Closed" style="width:75px;"></label>
                </div>
            </div>

            </div>
        </div>
    </div> <!-- end col -->

            

</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- apexcharts -->
<script src="<?php echo e(URL::asset('/build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<!-- dashboard init -->
<script src="<?php echo e(URL::asset('build/js/pages/dashboard.init.js')); ?>"></script>
<!-- form advanced init -->
<script src="<?php echo e(URL::asset('/build/js/pages/form-advanced.init.js')); ?>"></script>
<!--tinymce js-->
<script src="build/libs/tinymce/tinymce.min.js"></script>
<!-- init js -->
<script src="build/js/pages/form-editor.init.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Bakery/custView.blade.php ENDPATH**/ ?>