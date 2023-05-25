

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('View Order'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> View Order <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

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
                                <tr>
                                    <th>Delivery Charge</th>
                                    <td><?php echo e($order->postcode->name); ?></td>
                                    <td><?php echo e($order->postcode->price); ?></td>
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
                    <div class="col-md-8 pt-1">
                        <?php if($order->order_status == 1): ?>
                        <span class="badge rounded-pill badge-soft-info font-size-16"
                            id="task-status">New</span>
                            
                        <?php elseif($order->order_status == 2): ?>
                        <span class="badge rounded-pill badge-soft-warning font-size-16"
                            id="task-status">In Progress</span>

                        <?php elseif($order->order_status == 3): ?>
                        <span class="badge rounded-pill badge-soft-success font-size-16"
                            id="task-status">Ready</span>
                            
                        <?php elseif($order->order_status == 4): ?>
                        <span class="badge rounded-pill badge-soft-success font-size-16"
                            id="task-status">Completed</span>

                        <?php else: ?>
                        <span class="badge rounded-pill badge-soft-danger font-size-16"
                            id="task-status">Cancelled</span>

                        <?php endif; ?>
                    </div>
                </div>

                <h4 id="display_price" class="card-title mb-4 text-end text-primary" style="font-size:25px;margin-top:10px;margin-right:10px;">Total Price : RM<?php echo e($order->total_price); ?></h4>

                <h4 id="display_deposit" class="card-title mb-4 text-end text-info" style="font-size:15px;margin-top:10px;margin-right:10px;">Deposit Price : RM<?php echo e($order->deposit_price); ?></h4>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <a href="<?php echo e(route('order.custIndex')); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                    </div>
                </div>

        </div>
    </div>
</div>
<!-- end row -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Order/view.blade.php ENDPATH**/ ?>