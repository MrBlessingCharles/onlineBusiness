<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php echo $__env->yieldContent('title'); ?></title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/font-awesome.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/ionicons.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/datepicker3.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/all.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/select2.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/dataTables.bootstrap.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/jquery.fancybox.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/AdminLTE.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/_all-skins.min.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/on-off-switch.css')); ?>"/>
      <link rel="stylesheet" href="<?php echo e(asset('backend/css/summernote.css')); ?>">
      <link rel="stylesheet" href="<?php echo e(asset('backend/style.css')); ?>">
   </head>
   <body class="hold-transition fixed skin-blue sidebar-mini">
      <div class="wrapper">

         <!-- start header  -->
            <?php echo $__env->make('admin_layout.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
         <!-- end header  -->

         <!-- start Side Bar to Manage Shop Activities -->
            <?php echo $__env->make('admin_layout.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        
        <!-- end Side Bar to Manage Shop Activities -->

            <!-- start content -->
              <?php echo $__env->yieldContent('content'); ?>
            <!-- end content content -->

      </div>
       <?php echo $__env->make('admin_layout.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </body>
</html>

<?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\admin_layout\master.blade.php ENDPATH**/ ?>