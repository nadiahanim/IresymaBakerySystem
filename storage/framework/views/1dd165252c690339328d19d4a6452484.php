

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('My Bakery'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> My Bakery <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

        <div class="row mb-2">
                <label for="name" class="col-md-2 col-form-label control-label">Bakery Name</label>
                <div class="col-md-10">
                    <input name="name" type="text" class="form-control" id="name" value="<?php echo e($bakery_data->bakery_name); ?>" disabled>
                </div>
            </div>

            <div class="row mb-2">
                <label for="location" class="col-md-2 col-form-label control-label">Location</label>
                <div class="col-md-10">                   
                    <textarea class="form-control" name="location" rows="2" disabled><?php echo e($bakery_data->bakery_location); ?></textarea>
                </div>
            </div>

            <div class="row mb-2">
                <label for="phone_no" class="col-md-2 col-form-label control-label">Telephone No.</label>
                <div class="col-md-10">
                    <input name="phone_no" type="text" class="form-control" id="phone_no"  value="<?php echo e($bakery_data->bakery_contact); ?>" disabled>
                </div>
            </div>

            <div class="row mb-2">
                <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                <div class="col-md-10">                   
                    <textarea id="elm1" name="description"><?php echo e($bakery_data->bakery_desc); ?></textarea>
                </div>
            </div>
            <br>
            <div class="row mb-2">
                <label for="description" class="col-md-2 col-form-label control-label">Operation Type</label>
                <div class="col-md-10">                   
                    <div class="square-switch">
                        <input type="checkbox" id="square-switch1" switch="info" name="operation_type" disabled <?php echo e((($bakery_data->operation_type) == 1) ? 'checked' : ''); ?>/>
                        <label for="square-switch1" data-on-label="Auto" data-off-label="Manual" style="width:75px;"></label>
                    </div>
                </div>
            </div>

            <div class="row mb-2" id="auto_operation">
                <label for="description" class="col-md-2 col-form-label control-label">Operating Hours</label>
                <div class="col-md-10">
                    <div class="table-responsive mb-4">
                        <table id="datatable_operating_hour" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                            <thead class="table-light">
                                <tr role="row">
                                    <th class="text-center" width="15%">
                                        <div class="form-group">
                                            <label class="col-form-label control-label">Day</label>
                                        </div>
                                    </th>
                                    <th class="text-center" width="25%">
                                        <div class="form-group">
                                            <label class="col-form-label control-label">Start Hour</label>
                                        </div>
                                    </th>
                                    <th class="text-center" width="25%">
                                        <div class="form-group">
                                            <label class="col-form-label control-label">End Hour</label>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="field_wrapper">
                                <tr> <!-- monday -->>
                                    <td class="text-center"><?php echo e($operating_hour[0]->day); ?></td> 
                                    <td>
                                        <input type="time" class="form-control" name="start_monday" id ="start_monday" value="<?php echo e($operating_hour[0]->start_hour); ?>">
                                    </td> 
                                    <td>
                                        <input type="time" class="form-control" name="end_monday" id ="end_monday" value="<?php echo e($operating_hour[0]->end_hour); ?>">
                                    </td>                          
                                </tr>
                                <tr> <!-- tuesday -->
                                    <td class="text-center"><?php echo e($operating_hour[1]->day); ?></td> 
                                    <td>
                                        <input type="time" class="form-control" name="start_tuesday" id ="start_tuesday" value="<?php echo e($operating_hour[1]->start_hour); ?>">
                                    </td> 
                                    <td>
                                        <input type="time" class="form-control" name="end_tuesday" id ="end_tuesday" value="<?php echo e($operating_hour[1]->end_hour); ?>">
                                    </td>                          
                                </tr>
                                <tr> <!-- wednesday -->
                                    <td class="text-center"><?php echo e($operating_hour[2]->day); ?></td> 
                                    <td>
                                        <input type="time" class="form-control" name="start_wednesday" id ="start_wednesday" value="<?php echo e($operating_hour[2]->start_hour); ?>">
                                    </td> 
                                    <td>
                                        <input type="time" class="form-control" name="end_wednesday" id ="end_wednesday" value="<?php echo e($operating_hour[2]->end_hour); ?>">
                                    </td>                          
                                </tr>
                                <tr> <!-- thursday -->
                                    <td class="text-center"><?php echo e($operating_hour[3]->day); ?></td> 
                                    <td>
                                        <input type="time" class="form-control" name="start_thursday" id ="start_thursday" value="<?php echo e($operating_hour[3]->start_hour); ?>">
                                    </td> 
                                    <td>
                                        <input type="time" class="form-control" name="end_thursday" id ="end_thursday" value="<?php echo e($operating_hour[3]->end_hour); ?>">
                                    </td>                          
                                </tr>
                                <tr> <!-- friday -->
                                    <td class="text-center"><?php echo e($operating_hour[4]->day); ?></td> 
                                    <td>
                                        <input type="time" class="form-control" name="start_friday" id ="start_friday" value="<?php echo e($operating_hour[4]->start_hour); ?>">
                                    </td> 
                                    <td>
                                        <input type="time" class="form-control" name="end_friday" id ="end_friday" value="<?php echo e($operating_hour[4]->end_hour); ?>">
                                    </td>                          
                                </tr>
                                <tr> <!-- saturday -->
                                    <td class="text-center"><?php echo e($operating_hour[5]->day); ?></td> 
                                    <td>
                                        <input type="time" class="form-control" name="start_saturday" id ="start_saturday" value="<?php echo e($operating_hour[5]->start_hour); ?>">
                                    </td> 
                                    <td>
                                        <input type="time" class="form-control" name="end_saturday" id ="end_saturday" value="<?php echo e($operating_hour[5]->end_hour); ?>">
                                    </td>                          
                                </tr>
                                <tr> <!-- sunday -->
                                    <td class="text-center"><?php echo e($operating_hour[6]->day); ?></td> 
                                    <td>
                                        <input type="time" class="form-control" name="start_sunday" id ="start_sunday" value="<?php echo e($operating_hour[6]->start_hour); ?>">
                                    </td> 
                                    <td>
                                        <input type="time" class="form-control" name="end_sunday" id ="end_sunday" value="<?php echo e($operating_hour[6]->end_hour); ?>">
                                    </td>                          
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mb-2" id="manual_operation">
                <label for="description" class="col-md-2 col-form-label control-label">Business Operation</label>
                <div class="col-md-10">                   
                    <input type="checkbox" id="switch3" switch="bool" name="operation" disabled <?php echo e((($bakery_data->bakery_operation) == 1) ? 'checked' : ''); ?>/>
                    <label for="switch3" data-on-label="Open" data-off-label="Closed" style="width:75px;"></label>
                </div>
            </div>

            <div class="mb-3 row">
                <div class="col-sm-11 offset-sm-1">
                    <a href="<?php echo e(route('bakery.edit')); ?>" class="btn btn-primary float-end">Edit</a>
                </div>
            </div>

        </div>
    </div>
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
<script src="<?php echo e(URL::asset('/build/js/pages/Bakery/operation.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Bakery/view.blade.php ENDPATH**/ ?>