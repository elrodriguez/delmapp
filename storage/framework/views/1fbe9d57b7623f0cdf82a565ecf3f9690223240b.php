
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
    <li class="breadcrumb-item"><?php echo e(__('inventory::labels.module_name')); ?></li>
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
        <small>Disponibles para el usuario</small>
    </h1>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::item.item-number-movements')->html();
} elseif ($_instance->childHasBeenRendered('Aj0ysJQ')) {
    $componentId = $_instance->getRenderedChildComponentId('Aj0ysJQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('Aj0ysJQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Aj0ysJQ');
} else {
    $response = \Livewire\Livewire::mount('inventory::item.item-number-movements');
    $html = $response->html();
    $_instance->logRenderedChild('Aj0ysJQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::location.location-quantity')->html();
} elseif ($_instance->childHasBeenRendered('jxu1Ug0')) {
    $componentId = $_instance->getRenderedChildComponentId('jxu1Ug0');
    $componentTag = $_instance->getRenderedChildComponentTagName('jxu1Ug0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jxu1Ug0');
} else {
    $response = \Livewire\Livewire::mount('inventory::location.location-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('jxu1Ug0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::category.category-quantity')->html();
} elseif ($_instance->childHasBeenRendered('3qFqO6H')) {
    $componentId = $_instance->getRenderedChildComponentId('3qFqO6H');
    $componentTag = $_instance->getRenderedChildComponentTagName('3qFqO6H');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3qFqO6H');
} else {
    $response = \Livewire\Livewire::mount('inventory::category.category-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('3qFqO6H', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::brand.brand-quantity')->html();
} elseif ($_instance->childHasBeenRendered('mnl7HqK')) {
    $componentId = $_instance->getRenderedChildComponentId('mnl7HqK');
    $componentTag = $_instance->getRenderedChildComponentTagName('mnl7HqK');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mnl7HqK');
} else {
    $response = \Livewire\Livewire::mount('inventory::brand.brand-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('mnl7HqK', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::item.item-quantity')->html();
} elseif ($_instance->childHasBeenRendered('BhW1Pqz')) {
    $componentId = $_instance->getRenderedChildComponentId('BhW1Pqz');
    $componentTag = $_instance->getRenderedChildComponentTagName('BhW1Pqz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('BhW1Pqz');
} else {
    $response = \Livewire\Livewire::mount('inventory::item.item-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('BhW1Pqz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::asset.asset-quantity')->html();
} elseif ($_instance->childHasBeenRendered('zZMPQse')) {
    $componentId = $_instance->getRenderedChildComponentId('zZMPQse');
    $componentTag = $_instance->getRenderedChildComponentTagName('zZMPQse');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zZMPQse');
} else {
    $response = \Livewire\Livewire::mount('inventory::asset.asset-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('zZMPQse', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::purchase.purchase-quantity')->html();
} elseif ($_instance->childHasBeenRendered('gv2Jk4d')) {
    $componentId = $_instance->getRenderedChildComponentId('gv2Jk4d');
    $componentTag = $_instance->getRenderedChildComponentTagName('gv2Jk4d');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gv2Jk4d');
} else {
    $response = \Livewire\Livewire::mount('inventory::purchase.purchase-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('gv2Jk4d', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inventory::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Inventory\Resources/views/index.blade.php ENDPATH**/ ?>