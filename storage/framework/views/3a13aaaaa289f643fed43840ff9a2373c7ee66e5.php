
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
    <li class="breadcrumb-item">Configuraciones</li>
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
    <div class="subheader-block">
        Dashboard
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::company.company-data')->html();
} elseif ($_instance->childHasBeenRendered('626xP4G')) {
    $componentId = $_instance->getRenderedChildComponentId('626xP4G');
    $componentTag = $_instance->getRenderedChildComponentTagName('626xP4G');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('626xP4G');
} else {
    $response = \Livewire\Livewire::mount('setting::company.company-data');
    $html = $response->html();
    $_instance->logRenderedChild('626xP4G', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-6 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::establishment.establishment-quantity')->html();
} elseif ($_instance->childHasBeenRendered('dcbDtXA')) {
    $componentId = $_instance->getRenderedChildComponentId('dcbDtXA');
    $componentTag = $_instance->getRenderedChildComponentTagName('dcbDtXA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('dcbDtXA');
} else {
    $response = \Livewire\Livewire::mount('setting::establishment.establishment-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('dcbDtXA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::roles.roles-quantity')->html();
} elseif ($_instance->childHasBeenRendered('YfvMjw9')) {
    $componentId = $_instance->getRenderedChildComponentId('YfvMjw9');
    $componentTag = $_instance->getRenderedChildComponentTagName('YfvMjw9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('YfvMjw9');
} else {
    $response = \Livewire\Livewire::mount('setting::roles.roles-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('YfvMjw9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::modules.module-quantity')->html();
} elseif ($_instance->childHasBeenRendered('lI9wA85')) {
    $componentId = $_instance->getRenderedChildComponentId('lI9wA85');
    $componentTag = $_instance->getRenderedChildComponentTagName('lI9wA85');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lI9wA85');
} else {
    $response = \Livewire\Livewire::mount('setting::modules.module-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('lI9wA85', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::user.user-quantity')->html();
} elseif ($_instance->childHasBeenRendered('hFnql2K')) {
    $componentId = $_instance->getRenderedChildComponentId('hFnql2K');
    $componentTag = $_instance->getRenderedChildComponentTagName('hFnql2K');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('hFnql2K');
} else {
    $response = \Livewire\Livewire::mount('setting::user.user-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('hFnql2K', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::user.user-sessions')->html();
} elseif ($_instance->childHasBeenRendered('n8GRji9')) {
    $componentId = $_instance->getRenderedChildComponentId('n8GRji9');
    $componentTag = $_instance->getRenderedChildComponentTagName('n8GRji9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('n8GRji9');
} else {
    $response = \Livewire\Livewire::mount('setting::user.user-sessions');
    $html = $response->html();
    $_instance->logRenderedChild('n8GRji9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-6 col-xl-3">

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Setting\Resources/views/index.blade.php ENDPATH**/ ?>