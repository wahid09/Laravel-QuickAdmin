<?php if(config('sweetalert.alwaysLoadJS') === true && config('sweetalert.neverLoadJS') === false ): ?>
    <script src="<?php echo e($cdn ?? asset('vendor/sweetalert/sweetalert.all.js')); ?>"></script>
<?php endif; ?>
<?php if(Session::has('alert.config')): ?>
    <?php if(config('sweetalert.animation.enable')): ?>
        <link rel="stylesheet" href="<?php echo e(config('sweetalert.animatecss')); ?>">
    <?php endif; ?>
    <?php if(config('sweetalert.alwaysLoadJS') === false && config('sweetalert.neverLoadJS') === false): ?>
        <script src="<?php echo e($cdn ?? asset('vendor/sweetalert/sweetalert.all.js')); ?>"></script>
    <?php endif; ?>
    <script>
        Swal.fire(<?php echo Session::pull('alert.config'); ?>);
    </script>
<?php endif; ?>
<?php /**PATH D:\laragon\www\QuickAdmin\vendor\realrashid\sweet-alert\src/../resources/views/alert.blade.php ENDPATH**/ ?>