<?php if(Session::has('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Successful',
            text: "<?php echo e(Session::get('success')); ?>",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Unsuccessful',
            text: "<?php echo e(Session::get('error')); ?>",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
<?php endif; ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/components/alert.blade.php ENDPATH**/ ?>