

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('My Orders'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- dragula css -->
    <link href="<?php echo e(URL::asset('/build/libs/dragula/dragula.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> My Orders <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#new" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">New</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#inprogress" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">In Progress</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#ready" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                        <span class="d-none d-sm-block">Ready</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#completed" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">Completed</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#cancelled" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                        <span class="d-none d-sm-block">Cancelled</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="new" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-shape" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Order ID</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Total Price(RM)</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Delivery Date</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Last Updated</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $new_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center"><?php echo e($loop->iteration); ?></th>
                                            <td>Order #<?php echo e($data->id); ?></td> 
                                            <td class="text-center"><?php echo e($data->total_price); ?></td>
                                            <td class="text-center"><?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></td>                                           
                                            <td class="text-center"><?php echo e(date('d/m/Y h:i a', strtotime($data->updated_on))); ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('order.view', ['order_id'=>$data->id])); ?>" class="btn btn-soft-info btn-sm"><i class="mdi mdi-magnify mdi-18px"></i></a>                                                   
                                                </div>
                                            </td> 
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="inprogress" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-shape" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Order ID</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Total Price(RM)</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Delivery Date</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Last Updated</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $in_progress_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center"><?php echo e($loop->iteration); ?></th>
                                            <td>Order #<?php echo e($data->id); ?></td> 
                                            <td class="text-center"><?php echo e($data->total_price); ?></td>
                                            <td class="text-center"><?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></td>                                           
                                            <td class="text-center"><?php echo e(date('d/m/Y h:i a', strtotime($data->updated_on))); ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('order.view', ['order_id'=>$data->id])); ?>" class="btn btn-soft-info btn-sm"><i class="mdi mdi-magnify mdi-18px"></i></a>                                                   
                                                </div>
                                            </td> 
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="ready" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-shape" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Order ID</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Total Price(RM)</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Delivery Date</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Last Updated</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $ready_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center"><?php echo e($loop->iteration); ?></th>
                                            <td>Order #<?php echo e($data->id); ?></td> 
                                            <td class="text-center"><?php echo e($data->total_price); ?></td>
                                            <td class="text-center"><?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></td>                                           
                                            <td class="text-center"><?php echo e(date('d/m/Y h:i a', strtotime($data->updated_on))); ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('order.view', ['order_id'=>$data->id])); ?>" class="btn btn-soft-info btn-sm"><i class="mdi mdi-magnify mdi-18px"></i></a>                                                   
                                                </div>
                                            </td> 
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="completed" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-shape" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Order ID</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Total Price(RM)</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Delivery Date</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Last Updated</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $completed_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center"><?php echo e($loop->iteration); ?></th>
                                            <td>Order #<?php echo e($data->id); ?></td> 
                                            <td class="text-center"><?php echo e($data->total_price); ?></td>
                                            <td class="text-center"><?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></td>                                           
                                            <td class="text-center"><?php echo e(date('d/m/Y h:i a', strtotime($data->updated_on))); ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('order.view', ['order_id'=>$data->id])); ?>" class="btn btn-soft-info btn-sm"><i class="mdi mdi-magnify mdi-18px"></i></a>                                                   
                                                </div>
                                            </td> 
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="cancelled" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-shape" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Order ID</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Total Price(RM)</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Delivery Date</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Last Updated</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $cancelled_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center"><?php echo e($loop->iteration); ?></th>
                                            <td>Order #<?php echo e($data->id); ?></td> 
                                            <td class="text-center"><?php echo e($data->total_price); ?></td>
                                            <td class="text-center"><?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></td>                                           
                                            <td class="text-center"><?php echo e(date('d/m/Y h:i a', strtotime($data->updated_on))); ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('order.view', ['order_id'=>$data->id])); ?>" class="btn btn-soft-info btn-sm"><i class="mdi mdi-magnify mdi-18px"></i></a>                                                   
                                                </div>
                                            </td> 
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- dragula plugins -->
    <script src="<?php echo e(URL::asset('build/libs/dragula/dragula.min.js')); ?>"></script>
    <!-- jquery-validation -->
    <script src="<?php echo e(URL::asset('build/libs/jquery-validation/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/task-kanban.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/task-form.init.js')); ?>"></script>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
     <!-- Responsive examples -->
     <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/build/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Order/custIndex.blade.php ENDPATH**/ ?>