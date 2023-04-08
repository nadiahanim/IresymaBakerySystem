

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('My Services'); ?>
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

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> My Services <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="row mb-2">
        <div class="col-sm-11 offset-sm-1">
            <a type="button" href="<?php echo e(route('service.create')); ?>" class="btn float-end waves-effect waves-light" style="background-color:#F2A0A0;color:white;">Add New Service</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Service Categories</h4>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#shape" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block"><?php echo e($categories[0]->name); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#flavour" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block"><?php echo e($categories[1]->name); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#cream" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block"><?php echo e($categories[2]->name); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#size" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block"><?php echo e($categories[3]->name); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#tier" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block"><?php echo e($categories[4]->name); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#decorations" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block"><?php echo e($categories[5]->name); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#delivery" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block"><?php echo e($categories[6]->name); ?></span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <!-- START SHAPE -->
                <div class="tab-pane active" id="shape" role="tabpanel">
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
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $service_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center" ><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($data->name); ?></td> 
                                            <td><?php echo e($data->price); ?></td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('service.edit', ['service_id' => $data->id])); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="<?php echo e(route('service.delete')); ?>">
                                                    <?php echo e(csrf_field()); ?> 
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($data->id); ?>">
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
                <!-- END SHAPE -->

                <!-- START CAKE FLAVOUR -->
                <div class="tab-pane" id="flavour" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-flavour" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $service_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center" ><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($data->name); ?></td> 
                                            <td><?php echo e($data->price); ?></td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('service.edit', ['service_id' => $data->id])); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="<?php echo e(route('service.delete')); ?>">
                                                    <?php echo e(csrf_field()); ?> 
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($data->id); ?>">
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
                <!-- END CAKE FLAVOUR -->

                <!-- START CREAM FLAVOUR -->
                <div class="tab-pane" id="cream" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-cream" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $service_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center" ><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($data->name); ?></td> 
                                            <td><?php echo e($data->price); ?></td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('service.edit', ['service_id' => $data->id])); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="<?php echo e(route('service.delete')); ?>">
                                                    <?php echo e(csrf_field()); ?> 
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($data->id); ?>">
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
                <!-- END CREAM FLAVOUR -->

                <!-- START CAKE SIZE -->
                <div class="tab-pane" id="size" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-size" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $service_4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center" ><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($data->name); ?></td> 
                                            <td><?php echo e($data->price); ?></td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('service.edit', ['service_id' => $data->id])); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="<?php echo e(route('service.delete')); ?>">
                                                    <?php echo e(csrf_field()); ?> 
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($data->id); ?>">
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
                <!-- END CAKE SIZE -->

                <!-- START TIER NO -->
                <div class="tab-pane" id="tier" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-tier" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $service_5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center" ><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($data->name); ?></td> 
                                            <td><?php echo e($data->price); ?></td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('service.edit', ['service_id' => $data->id])); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="<?php echo e(route('service.delete')); ?>">
                                                    <?php echo e(csrf_field()); ?> 
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($data->id); ?>">
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
                <!-- END TIER NO -->

                <!-- START DECORATIONS -->
                <div class="tab-pane" id="decorations" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-deco" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $service_6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center" ><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($data->name); ?></td> 
                                            <td><?php echo e($data->price); ?></td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('service.edit', ['service_id' => $data->id])); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="<?php echo e(route('service.delete')); ?>">
                                                    <?php echo e(csrf_field()); ?> 
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($data->id); ?>">
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
                <!-- END DECORATIONS -->

                <!-- START DELIVERY AREA -->
                <div class="tab-pane" id="delivery" role="tabpanel">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="table-responsive mb-4">
                                <input type="hidden" name="total_row" id="total_row">
                                <table id="datatable-delivery" class="table table-bordered dt-responsive nowrap w-100 dataTable" role="grid">
                                    <thead class="table-light">
                                        <tr role="row">
                                            <th class="text-center" width="3%">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">No.</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Name</label>
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="form-group">
                                                    <label class="col-form-label control-label">Price (RM)</label>
                                                </div>
                                            </th>
                                            <th>
                                                <div class="form-group">
                                                    
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="field_wrapper">
                                        <?php $__currentLoopData = $service_6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-center" ><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($data->name); ?></td> 
                                            <td><?php echo e($data->price); ?></td> 
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(route('service.edit', ['service_id' => $data->id])); ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil mdi-18px"></i></a>&nbsp;
                                                    <a class='btn btn-danger btn-sm swal-delete-list'><i class="mdi mdi-minus mdi-18px"></i></a>
                                                </div>
                                                <form id="delete-form" method="POST" action="<?php echo e(route('service.delete')); ?>">
                                                    <?php echo e(csrf_field()); ?> 
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <input name="service_id" type="hidden" class="form-control" id="service_id" value="<?php echo e($data->id); ?>">
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
                <!-- END DELIVERY AREA -->

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
    <!-- Buttons examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/build/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Service/index.blade.php ENDPATH**/ ?>