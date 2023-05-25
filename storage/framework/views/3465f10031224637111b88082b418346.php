

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Order List'); ?>
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
<?php $__env->slot('title'); ?> Order List <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">

            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-bs-toggle="tab" href="#table" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Table View</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#kanban" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Kanban View</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="table" role="tabpanel">
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
                                                    <label class="col-form-label control-label">Customer Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Delivery Date</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Status</label>
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
                                        <?php $__currentLoopData = $all_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center"><?php echo e($loop->iteration); ?></th>
                                            <td>Order #<?php echo e($data->id); ?></td> 
                                            <td><?php echo e($data->customer->fullname); ?></td>
                                            <td class="text-center"><?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></td>
                                            <td class="text-center">
                                                <?php if($data->order_status == 1): ?>
                                                <span class="badge rounded-pill badge-soft-info font-size-14"
                                                    id="task-status">New</span>
                                                    
                                                <?php elseif($data->order_status == 2): ?>
                                                <span class="badge rounded-pill badge-soft-warning font-size-14"
                                                    id="task-status">In Progress</span>

                                                <?php elseif($data->order_status == 3): ?>
                                                <span class="badge rounded-pill badge-soft-success font-size-14"
                                                    id="task-status">Complete</span>
                                                    
                                                <?php elseif($data->order_status == 4): ?>
                                                <span class="badge rounded-pill badge-soft-success font-size-14"
                                                    id="task-status">Delivered</span>

                                                <?php else: ?>
                                                <span class="badge rounded-pill badge-soft-danger font-size-14"
                                                    id="task-status">Cancelled</span>

                                                <?php endif; ?>
                                            </td> 
                                            <td class="text-center"><?php echo e(date('d/m/Y h:i a', strtotime($data->updated_on))); ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('order.edit', ['order_id'=>$data->id])); ?>" class="btn btn-soft-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>                                                   
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
                <div class="tab-pane" id="kanban" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Upcoming</h4>
                                    <div id="task-1">
                                        <div id="upcoming-task" class="pb-1 task-list">
                                        <?php $__currentLoopData = $new_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card task-box" id="uptask-1">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="<?php echo e(route('order.edit', ['order_id'=>$data->id])); ?>"
                                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->
                                                    <div class="float-end ml-2">

                                                        <?php if($data->order_status == 1): ?>
                                                        <span class="badge rounded-pill badge-soft-info font-size-12"
                                                            id="task-status">New</span>
                                                            
                                                        <?php elseif($data->order_status == 2): ?>
                                                        <span class="badge rounded-pill badge-soft-warning font-size-12"
                                                            id="task-status">In Progress</span>

                                                        <?php else: ?>
                                                        <span class="badge rounded-pill badge-soft-success font-size-12"
                                                            id="task-status">Complete</span>

                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                                id="task-name">Order #<?php echo e($data->id); ?></a></h5>
                                                        <p class="text-muted mb-4"><?php echo e($data->customer->fullname); ?></p>
                                                    </div>

                                                    <div class="text-end">
                                                        <h5 class="font-size-13 mb-1" id="task-budget">Delivery Date: <?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></h5>
                                                        <p class="mb-0 text-muted">Total: RM <?php echo e($data->total_price); ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end task card -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title mb-4">In Progress</h4>
                                    <div id="task-2">
                                        <div id="inprogress-task" class="pb-1 task-list">
                                        <?php $__currentLoopData = $in_progress_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card task-box" id="intask-1">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="<?php echo e(route('order.edit', ['order_id'=>$data->id])); ?>"
                                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->

                                                    <div class="float-end ml-2">
                                                        <?php if($data->order_status == 1): ?>
                                                        <span class="badge rounded-pill badge-soft-info font-size-12"
                                                            id="task-status">New</span>
                                                            
                                                        <?php elseif($data->order_status == 2): ?>
                                                        <span class="badge rounded-pill badge-soft-warning font-size-12"
                                                            id="task-status">In Progress</span>

                                                        <?php else: ?>
                                                        <span class="badge rounded-pill badge-soft-success font-size-12"
                                                            id="task-status">Complete</span>

                                                        <?php endif; ?>
                                                    </div>

                                                    <div>
                                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                            id="task-name">Order #<?php echo e($data->id); ?></a></h5>
                                                        <p class="text-muted mb-4"><?php echo e($data->customer->fullname); ?></p>
                                                    </div>

                                                    <div class="text-end">
                                                        <h5 class="font-size-13 mb-1" id="task-budget">Delivery Date: <?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></h5>
                                                        <p class="mb-0 text-muted">Total: RM <?php echo e($data->total_price); ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end task card -->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Completed</h4>
                                    <div id="task-3">
                                        <div id="complete-task" class="pb-1 task-list">
                                        <?php $__currentLoopData = $completed_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card task-box" id="cmptask-1">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="<?php echo e(route('order.edit', ['order_id'=>$data->id])); ?>"
                                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                                        </div>
                                                    </div> <!-- end dropdown -->

                                                    <div class="float-end ml-2">
                                                        <?php if($data->order_status == 1): ?>
                                                        <span class="badge rounded-pill badge-soft-info font-size-12"
                                                            id="task-status">New</span>
                                                            
                                                        <?php elseif($data->order_status == 2): ?>
                                                        <span class="badge rounded-pill badge-soft-warning font-size-12"
                                                            id="task-status">In Progress</span>

                                                        <?php else: ?>
                                                        <span class="badge rounded-pill badge-soft-success font-size-12"
                                                            id="task-status">Complete</span>

                                                        <?php endif; ?>
                                                    </div>

                                                    <div>
                                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                            id="task-name">Order #<?php echo e($data->id); ?></a></h5>
                                                        <p class="text-muted mb-4"><?php echo e($data->customer->fullname); ?></p>
                                                    </div>

                                                    <div class="text-end">
                                                        <h5 class="font-size-13 mb-1" id="task-budget">Delivery Date: <?php echo e(date('d/m/Y', strtotime($data->deli_date))); ?></h5>
                                                        <p class="mb-0 text-muted">Total: RM <?php echo e($data->total_price); ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end task card -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Order/index.blade.php ENDPATH**/ ?>