<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    




</head>

<body class="layout-navbar-mini-fixed-bottom">

    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('landlord.login-form', [])->html();
} elseif ($_instance->childHasBeenRendered('AyTwUSz')) {
    $componentId = $_instance->getRenderedChildComponentId('AyTwUSz');
    $componentTag = $_instance->getRenderedChildComponentTagName('AyTwUSz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('AyTwUSz');
} else {
    $response = \Livewire\Livewire::mount('landlord.login-form', []);
    $html = $response->html();
    $_instance->logRenderedChild('AyTwUSz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> 


        <?php echo \Livewire\Livewire::scripts(); ?>

    </body>
</html><?php /**PATH C:\laragon\www\delmapp\resources\views/landlord/login.blade.php ENDPATH**/ ?>