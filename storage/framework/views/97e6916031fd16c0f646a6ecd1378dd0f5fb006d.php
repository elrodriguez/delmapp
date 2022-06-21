
<?php $__env->startSection('breadcrumb'); ?>
    <?php if (isset($component)) { $__componentOriginalffde9e6d15fb644ab927a95d1432ec09268242d9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CompanyName::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('company-name'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CompanyName::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalffde9e6d15fb644ab927a95d1432ec09268242d9)): ?>
<?php $component = $__componentOriginalffde9e6d15fb644ab927a95d1432ec09268242d9; ?>
<?php unset($__componentOriginalffde9e6d15fb644ab927a95d1432ec09268242d9); ?>
<?php endif; ?>
    <li class="breadcrumb-item"><?php echo e(__('transferservice::labels.service_title')); ?></li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><?php if (isset($component)) { $__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\JsGetDate::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('js-get-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\JsGetDate::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525)): ?>
<?php $component = $__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525; ?>
<?php unset($__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525); ?>
<?php endif; ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheader'); ?>
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-tachometer-alt-fast'></i>Tablero <span class='fw-300'>de resumen</span> <sup class='badge badge-primary fw-500'>New</sup>
        <small><?php echo e(__('transferservice::labels.lbl_available_user')); ?></small>
    </h1>
    <div class="subheader-block">
        <?php echo e(__('transferservice::labels.lbl_dashBoard')); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('transferservice::customers.customers-quantity')->html();
} elseif ($_instance->childHasBeenRendered('EbU2qYI')) {
    $componentId = $_instance->getRenderedChildComponentId('EbU2qYI');
    $componentTag = $_instance->getRenderedChildComponentTagName('EbU2qYI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('EbU2qYI');
} else {
    $response = \Livewire\Livewire::mount('transferservice::customers.customers-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('EbU2qYI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="col-sm-6 col-xl-3">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('transferservice::locals.locals-quantity')->html();
} elseif ($_instance->childHasBeenRendered('oZn2WFF')) {
    $componentId = $_instance->getRenderedChildComponentId('oZn2WFF');
    $componentTag = $_instance->getRenderedChildComponentTagName('oZn2WFF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('oZn2WFF');
} else {
    $response = \Livewire\Livewire::mount('transferservice::locals.locals-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('oZn2WFF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('transferservice::odtrequests.odtrequests-quantity')->html();
} elseif ($_instance->childHasBeenRendered('ldfeunL')) {
    $componentId = $_instance->getRenderedChildComponentId('ldfeunL');
    $componentTag = $_instance->getRenderedChildComponentTagName('ldfeunL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ldfeunL');
} else {
    $response = \Livewire\Livewire::mount('transferservice::odtrequests.odtrequests-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('ldfeunL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="col-sm-6 col-xl-3">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('transferservice::vehicles.vehicles-quantity')->html();
} elseif ($_instance->childHasBeenRendered('cpz0f5q')) {
    $componentId = $_instance->getRenderedChildComponentId('cpz0f5q');
    $componentTag = $_instance->getRenderedChildComponentTagName('cpz0f5q');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cpz0f5q');
} else {
    $response = \Livewire\Livewire::mount('transferservice::vehicles.vehicles-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('cpz0f5q', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('transferservice::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/TransferService\Resources/views/index.blade.php ENDPATH**/ ?>