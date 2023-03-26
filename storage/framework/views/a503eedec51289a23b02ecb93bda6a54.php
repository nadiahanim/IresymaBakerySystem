<?php if(Session::has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show px-3 mb-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            <h5 class="text-success"> <i class="mdi mdi-check-all me-2"></i>Successful</h5>
            <p><?php echo e(Session::get('success')); ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show px-3 mb-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            <h5 class="text-danger"><i class="mdi mdi-block-helper me-2"></i>Unsuccessful</h5>
            <p><?php echo e(Session::get('error')); ?></p>
        </div>
    </div>
<?php endif; ?>

<?php if(Session::has('warning')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            <h5 class="text-warning"><i class="mdi mdi-alert-outline me-2"></i>Tidak Unsuccessful</h5>
            <p><?php echo e(Session::get('warning')); ?></p>
        </div>
    </div>
<?php endif; ?>


<!-- SERVER SIDE VALIDATION ERROR MESSAGE DISPLAY -->
<?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible fade show px-3 mb-2" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\Users\user\BakerySystem\resources\views/components/alert.blade.php ENDPATH**/ ?>