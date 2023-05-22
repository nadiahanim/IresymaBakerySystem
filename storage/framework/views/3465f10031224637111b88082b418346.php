

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Order List'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- dragula css -->
    <link href="<?php echo e(URL::asset('/build/libs/dragula/dragula.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Order List <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Upcoming</h4>
                    <div id="task-1">
                        <div id="upcoming-task" class="pb-1 task-list">

                            <div class="card task-box" id="uptask-1">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit"
                                                data-id="#uptask-1" data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#"
                                                data-id="#uptask-1">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-secondary font-size-12"
                                            id="task-status">Waiting</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="task-name">Topnav layout design</a></h5>
                                        <p class="text-muted mb-4">14 Oct, 2019</p>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 145</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

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
                            <div class="card task-box" id="intask-1">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit"
                                                data-id="#intask-1" data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#"
                                                data-id="#intask-1">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-success font-size-12"
                                            id="task-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="task-name">Brand logo design</a></h5>
                                        <p class="text-muted">12 Oct, 2019</p>
                                    </div>

                                    <ul class="list-inine ps-0 mb-4">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="<?php echo e(URL::asset('/build/images/companies/img-1.png')); ?>"
                                                            alt="" class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="<?php echo e(URL::asset('/build/images/companies/img-2.png')); ?>"
                                                            alt="" class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#">
                                                <div class="border rounded avatar-sm">
                                                    <span class="avatar-title bg-transparent">
                                                        <img src="<?php echo e(URL::asset('/build/images/companies/img-3.png')); ?>"
                                                            alt="" class="avatar-xs">
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-7">
                                                <img src="<?php echo e(URL::asset('/build/images/users/avatar-7.jpg')); ?>"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-8">
                                                <img src="<?php echo e(URL::asset('/build/images/users/avatar-8.jpg')); ?>"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 132</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

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
                            <div class="card task-box" id="cmptask-1">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical m-0 text-muted h5"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item edittask-details" href="#" id="taskedit"
                                                data-id="#cmptask-1" data-bs-toggle="modal"
                                                data-bs-target=".bs-example-modal-lg">Edit</a>
                                            <a class="dropdown-item deletetask" href="#"
                                                data-id="#cmptask-1">Delete</a>
                                        </div>
                                    </div> <!-- end dropdown -->
                                    <div class="float-end ml-2">
                                        <span class="badge rounded-pill badge-soft-success font-size-12"
                                            id="task-status">Complete</span>
                                    </div>
                                    <div>
                                        <h5 class="font-size-15"><a href="javascript: void(0);" class="text-dark"
                                                id="task-name">Redesign - Landing page</a></h5>
                                        <p class="text-muted mb-4">10 Oct, 2019</p>
                                    </div>

                                    <div class="avatar-group float-start task-assigne">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-1">
                                                <img src="<?php echo e(URL::asset('/build/images/users/avatar-1.jpg')); ?>"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-2">
                                                <img src="<?php echo e(URL::asset('/build/images/users/avatar-2.jpg')); ?>"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block" value="member-3">
                                                <img src="<?php echo e(URL::asset('/build/images/users/avatar-3.jpg')); ?>"
                                                    alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <h5 class="font-size-15 mb-1" id="task-budget">$ 145</h5>
                                        <p class="mb-0 text-muted">Budget</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end task card -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- dragula plugins -->
    <script src="<?php echo e(URL::asset('build/libs/dragula/dragula.min.js')); ?>"></script>

    <!-- jquery-validation -->
    <script src="<?php echo e(URL::asset('build/libs/jquery-validation/jquery.validate.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/task-kanban.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/task-form.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Order/index.blade.php ENDPATH**/ ?>