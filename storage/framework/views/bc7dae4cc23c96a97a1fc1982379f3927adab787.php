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
    <link type="text/css" href="<?php echo e(url('themes/tutorio/vendor/perfect-scrollbar.css')); ?>" rel="stylesheet">

    <!-- Fix Footer CSS -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/vendor/fix-footer.css')); ?>" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/css/material-icons.css')); ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo e(url('themes/tutorio/css/material-icons.rtl.css')); ?>" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/css/fontawesome.css')); ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo e(url('themes/tutorio/css/fontawesome.rtl.css')); ?>" rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/css/preloader.css')); ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo e(url('themes/tutorio/css/preloader.rtl.css')); ?>" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="<?php echo e(url('themes/tutorio/css/app.css')); ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo e(url('themes/tutorio/css/app.rtl.css')); ?>" rel="stylesheet">





</head>

<body class="layout-navbar-mini-fixed-bottom">

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('landlord.login-form', [])->html();
} elseif ($_instance->childHasBeenRendered('zduzGtf')) {
    $componentId = $_instance->getRenderedChildComponentId('zduzGtf');
    $componentTag = $_instance->getRenderedChildComponentTagName('zduzGtf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zduzGtf');
} else {
    $response = \Livewire\Livewire::mount('landlord.login-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('zduzGtf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> 


    <!-- jQuery -->
    <script src="<?php echo e(url('themes/tutorio/vendor/jquery.min.js')); ?>"></script>

    <!-- Bootstrap -->
    <script src="<?php echo e(url('themes/tutorio/vendor/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('themes/tutorio/vendor/bootstrap.min.js')); ?>"></script>

    <!-- Perfect Scrollbar -->
    <script src="<?php echo e(url('themes/tutorio/vendor/perfect-scrollbar.min.js')); ?>"></script>

    <!-- DOM Factory -->
    <script src="<?php echo e(url('themes/tutorio/vendor/dom-factory.js')); ?>"></script>

    <!-- MDK -->
    <script src="<?php echo e(url('themes/tutorio/vendor/material-design-kit.js')); ?>"></script>

    <!-- Fix Footer -->
    <script src="<?php echo e(url('themes/tutorio/vendor/fix-footer.js')); ?>"></script>

    <!-- Chart.js -->
    <script src="<?php echo e(url('themes/tutorio/vendor/Chart.min.js')); ?>"></script>

    <!-- App JS -->
    <script src="<?php echo e(url('themes/tutorio/js/app.js')); ?>"></script>

    <!-- Highlight.js -->
    <script src="<?php echo e(url('themes/tutorio/js/hljs.js')); ?>"></script>

    <!-- App Settings (safe to remove) -->
    <script src="<?php echo e(url('themes/tutorio/js/app-settings.js')); ?>"></script>
        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html><?php /**PATH C:\laragon\www\delmapp\resources\views/landlord/login.blade.php ENDPATH**/ ?>