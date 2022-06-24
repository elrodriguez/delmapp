
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
} elseif ($_instance->childHasBeenRendered('DLC9kSw')) {
    $componentId = $_instance->getRenderedChildComponentId('DLC9kSw');
    $componentTag = $_instance->getRenderedChildComponentTagName('DLC9kSw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DLC9kSw');
} else {
    $response = \Livewire\Livewire::mount('inventory::item.item-number-movements');
    $html = $response->html();
    $_instance->logRenderedChild('DLC9kSw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('8yL8Txl')) {
    $componentId = $_instance->getRenderedChildComponentId('8yL8Txl');
    $componentTag = $_instance->getRenderedChildComponentTagName('8yL8Txl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8yL8Txl');
} else {
    $response = \Livewire\Livewire::mount('inventory::location.location-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('8yL8Txl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::category.category-quantity')->html();
} elseif ($_instance->childHasBeenRendered('AUVGNk5')) {
    $componentId = $_instance->getRenderedChildComponentId('AUVGNk5');
    $componentTag = $_instance->getRenderedChildComponentTagName('AUVGNk5');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('AUVGNk5');
} else {
    $response = \Livewire\Livewire::mount('inventory::category.category-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('AUVGNk5', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::brand.brand-quantity')->html();
} elseif ($_instance->childHasBeenRendered('NvHvpQP')) {
    $componentId = $_instance->getRenderedChildComponentId('NvHvpQP');
    $componentTag = $_instance->getRenderedChildComponentTagName('NvHvpQP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NvHvpQP');
} else {
    $response = \Livewire\Livewire::mount('inventory::brand.brand-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('NvHvpQP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('h5ysQUI')) {
    $componentId = $_instance->getRenderedChildComponentId('h5ysQUI');
    $componentTag = $_instance->getRenderedChildComponentTagName('h5ysQUI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('h5ysQUI');
} else {
    $response = \Livewire\Livewire::mount('inventory::item.item-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('h5ysQUI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::asset.asset-quantity')->html();
} elseif ($_instance->childHasBeenRendered('BcqbBfp')) {
    $componentId = $_instance->getRenderedChildComponentId('BcqbBfp');
    $componentTag = $_instance->getRenderedChildComponentTagName('BcqbBfp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('BcqbBfp');
} else {
    $response = \Livewire\Livewire::mount('inventory::asset.asset-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('BcqbBfp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::purchase.purchase-quantity')->html();
} elseif ($_instance->childHasBeenRendered('hhK6hQI')) {
    $componentId = $_instance->getRenderedChildComponentId('hhK6hQI');
    $componentTag = $_instance->getRenderedChildComponentTagName('hhK6hQI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('hhK6hQI');
} else {
    $response = \Livewire\Livewire::mount('inventory::purchase.purchase-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('hhK6hQI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inventory::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Inventory\Resources/views/index.blade.php ENDPATH**/ ?>