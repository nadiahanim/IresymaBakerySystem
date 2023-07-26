

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('My Recipes'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> My Recipes <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="row mb-2">
        <div class="col-sm-11 offset-sm-1">
            <a type="button" href="<?php echo e(route('recipe.create')); ?>" class="btn float-end waves-effect waves-light" style="background-color:#F2A0A0;color:white;">Add New Recipe</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-recipe" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Title</label>
                                                </div>
                                            </th>
                                            <th width="20%">
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center" ><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($data->title); ?></td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('recipe.view', ['recipe_id' => $data->id])); ?>" class="btn btn-soft-primary btn-sm"><i class="mdi mdi-magnify mdi-18px"></i></a>
                                                    <!-- <a href="<?php echo e(route('recipe.edit', ['recipe_id' => $data->id])); ?>" class="btn btn-soft-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a> -->
                                                    <a class='btn btn-soft-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="<?php echo e(route('recipe.delete')); ?>">
                                                    <?php echo e(csrf_field()); ?> 
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <input name="recipe_id" type="hidden" class="form-control" id="recipe_id" value="<?php echo e($data->id); ?>">
                                                </form>
                                            </td> 
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

        </div>
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/build/js/pages/datatables.init.js')); ?>"></script>

    <?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Recipe/index.blade.php ENDPATH**/ ?>