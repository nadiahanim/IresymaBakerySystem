

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Update Order'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Update Order <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('order.update')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?> 
                <?php echo method_field('PATCH'); ?>

                <h4 class="mt-2 mb-3">Order #<?php echo e($order->id); ?></h4>
                <p class="my-1"><span class="text-muted me-2"></span>Ordered on: <?php echo e(date('d/m/Y', strtotime($order->ordered_on))); ?></p>
                <br>

                <h4 class="mb-3">Customer's Information</h4>
                <p class="my-1"><span class="text-muted me-2"></span>Name&emsp;&emsp;&emsp;&emsp;&emsp;: <?php echo e($order->customer->fullname); ?></p>
                <p class="my-1"><span class="text-muted me-2"></span>Email&emsp;&emsp;&emsp;&emsp;&emsp; : <?php echo e($order->customer->email); ?></p>
                <p class="my-1"><span class="text-muted me-2"></span>Telephone No.&emsp;: <?php echo e($order->customer->phone); ?></p>
                <br>

                <h4 class="mb-3">Delivery Information</h4>
                <p class="my-1"><span class="text-muted me-2"></span>Delivery Date&emsp;&emsp;&emsp;: <?php echo e(date('d/m/Y', strtotime($order->deli_date))); ?></p>
                <p class="my-1"><span class="text-muted me-2"></span>Delivery Time&emsp;&emsp;&emsp;: <?php echo e(date('h:i a', strtotime($order->deli_time))); ?></p>
                <p class="my-1"><span class="text-muted me-2"></span>Delivery Location&emsp; : <?php echo e($order->deli_address1); ?> <?php echo e($order->deli_address2); ?> <?php echo e($order->postcode->name); ?></p>
                <br>

                <h4 class="mb-3">Cake Information</h4>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th></th>
                                    <th>Detail</th>
                                    <th>Price(RM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Shape</th>
                                    <td><?php echo e($order_detail->cakeShape->name); ?></td>
                                    <td><?php echo e($order_detail->cakeShape->price); ?></td>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <td><?php echo e($order_detail->cakeSize->name); ?></td>
                                    <td><?php echo e($order_detail->cakeSize->price); ?></td>
                                </tr>
                                <tr>
                                    <th>No. of Tier</th>
                                    <td><?php echo e($order_detail->cakeTier->name); ?></td>
                                    <td><?php echo e($order_detail->cakeTier->price); ?></td>
                                </tr>
                                <tr>
                                    <th>Flavour</th>
                                    <td><?php echo e($order_detail->cakeFlavour->name); ?></td>
                                    <td><?php echo e($order_detail->cakeFlavour->price); ?></td>
                                </tr>
                                <tr>
                                    <th>Cream</th>
                                    <td><?php echo e($order_detail->creamFlavour->name); ?></td>
                                    <td><?php echo e($order_detail->creamFlavour->price); ?></td>
                                </tr>                           
                                <tr>
                                    <th>Decoration</th>
                                    <td><?php echo e($order_detail->cakeDeco->name); ?></td>
                                    <td><?php echo e($order_detail->cakeDeco->price); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="special_message" class="col-md-2 col-form-label control-label">Special Message</label>
                    <div class="col-md-8">
                        <input name="special_message" type="text" class="form-control" id="special_message" value="<?php echo e($order_detail->special_message); ?>" disabled>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="note" class="col-md-2 col-form-label control-label">Important Note</label>
                    <div class="col-md-8">
                        <input name="note" type="text" class="form-control" id="note" value="<?php echo e($order_detail->note); ?>" disabled>
                    </div>
                </div>

                <br><br>

                <div class="mb-2 row">
                    <label for="order_status" class="col-md-2 col-form-label control-label">Sample Image</label>
                    <div class="col-md-3">
                        <div class="row" style="display: flex; justify-content: center;align-items: center;">
                            <div style="height:220;width:200;border:solid;">
                            <?php if($order_detail->sample_image_path): ?>
                                <img width="200" src="<?php echo e(asset('storage/'.$order_detail->sample_image_path)); ?>" alt="<?php echo e($order_detail->sample_image_name); ?>" class="img-fluid mx-auto d-block">
                            <?php else: ?>
                                <img width="200" src="<?php echo e(URL::asset('build/images/tepung.png')); ?>" alt="No Image" class="img-fluid mx-auto d-block">
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <input  type="hidden" class="form-control" name="order_id" id="order_id" value="<?php echo e($order->id); ?>">

                <div class="mb-2 row">
                    <label for="order_status" class="col-md-2 col-form-label control-label">Order Status</label>
                    <div class="col-md-8">
                        <select class="form-select select2" id="order_status" name="order_status"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.order.status.required')); ?>" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer">
                            <option value="">-- Select --</option>
                            <option value="1" <?php echo e((old('order_status', $order->order_status) == 1) ? 'selected' : ''); ?>>New</option>    
                            <option value="2" <?php echo e((old('order_status', $order->order_status) == 2) ? 'selected' : ''); ?>>In Progress</option> 
                            <option value="3" <?php echo e((old('order_status', $order->order_status) == 3) ? 'selected' : ''); ?>>Complete</option>  
                            <option value="4" <?php echo e((old('order_status', $order->order_status) == 4) ? 'selected' : ''); ?>>Delivered</option>
                            <option value="5" <?php echo e((old('order_status', $order->order_status) == 5) ? 'selected' : ''); ?>>Cancelled</option>
                        </select>
                        <div id="errorContainer"></div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-update"><?php echo app('translator')->get('button.save'); ?></button>
                        <a href="<?php echo e(route('order.index')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- end row -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Order/edit.blade.php ENDPATH**/ ?>