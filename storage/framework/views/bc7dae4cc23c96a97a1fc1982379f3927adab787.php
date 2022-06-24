<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/vendor/perfect-scrollbar.css')); ?>" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/vendor/fix-footer.css')); ?>" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/css/material-icons.css')); ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/css/material-icons.rtl.css')); ?>" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/css/fontawesome.css')); ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/css/fontawesome.rtl.css')); ?>" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/css/preloader.css')); ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/css/preloader.rtl.css')); ?>" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/css/app.css')); ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo e(url('themes/tutorio/assets/css/app.rtl.css')); ?>" rel="stylesheet">





</head>

<body class="layout-navbar-mini-fixed-bottom">

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('landlord.login-form', [])->html();
} elseif ($_instance->childHasBeenRendered('mFtWcA7')) {
    $componentId = $_instance->getRenderedChildComponentId('mFtWcA7');
    $componentTag = $_instance->getRenderedChildComponentTagName('mFtWcA7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mFtWcA7');
} else {
    $response = \Livewire\Livewire::mount('landlord.login-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('mFtWcA7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> 
<!-- jQuery -->
<script src="<?php echo e(url('themes/tutorio/assets/vendor/jquery.min.js')); ?>"></script>

<!-- Bootstrap -->
<script src="<?php echo e(url('themes/tutorio/assets/vendor/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('themes/tutorio/assets/vendor/bootstrap.min.js')); ?>"></script>


<!-- Fix Footer -->
<script src="<?php echo e(url('themes/tutorio/assets/vendor/fix-footer.js')); ?>"></script>


<!-- App JS -->
<script src="<?php echo e(url('themes/tutorio/assets/js/app.js')); ?>"></script>



<!-- App Settings (safe to remove) -->
<script src="<?php echo e(url('themes/tutorio/assets/js/app-settings.js')); ?>"></script>

        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html><?php /**PATH C:\laragon\www\delmapp\resources\views/landlord/login.blade.php ENDPATH**/ ?>