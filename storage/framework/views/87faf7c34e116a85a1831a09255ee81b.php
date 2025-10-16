<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-topbar="light" data-body-image="img-1" data-sidebar-image="none" data-bs-theme="light">

    <head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?> | Moneyfrog 3.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="MoneyFrog - Financial Services | Mutual Funds Distributor | Investment Platform" name="description" />
    <meta content="CodeSpark Infotech Private Limited" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://moneyfrog.in/images/new_home/favicon.ico">
        <?php echo $__env->make('layouts.head-css', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </head>

    <?php echo $__env->yieldContent('body'); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('layouts.vendor-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </body>
</html>
<?php /**PATH C:\wamp64\www\moneyfrog_erp\resources\views/layouts/master-without-nav.blade.php ENDPATH**/ ?>