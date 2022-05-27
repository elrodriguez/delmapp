
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
} elseif ($_instance->childHasBeenRendered('Xx3xecR')) {
    $componentId = $_instance->getRenderedChildComponentId('Xx3xecR');
    $componentTag = $_instance->getRenderedChildComponentTagName('Xx3xecR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Xx3xecR');
} else {
    $response = \Livewire\Livewire::mount('setting::company.company-data');
    $html = $response->html();
    $_instance->logRenderedChild('Xx3xecR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-6 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::establishment.establishment-quantity')->html();
} elseif ($_instance->childHasBeenRendered('VIDIi4Y')) {
    $componentId = $_instance->getRenderedChildComponentId('VIDIi4Y');
    $componentTag = $_instance->getRenderedChildComponentTagName('VIDIi4Y');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VIDIi4Y');
} else {
    $response = \Livewire\Livewire::mount('setting::establishment.establishment-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('VIDIi4Y', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('pUutfHS')) {
    $componentId = $_instance->getRenderedChildComponentId('pUutfHS');
    $componentTag = $_instance->getRenderedChildComponentTagName('pUutfHS');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pUutfHS');
} else {
    $response = \Livewire\Livewire::mount('setting::roles.roles-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('pUutfHS', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::modules.module-quantity')->html();
} elseif ($_instance->childHasBeenRendered('Ii9ItQf')) {
    $componentId = $_instance->getRenderedChildComponentId('Ii9ItQf');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ii9ItQf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ii9ItQf');
} else {
    $response = \Livewire\Livewire::mount('setting::modules.module-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('Ii9ItQf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::user.user-quantity')->html();
} elseif ($_instance->childHasBeenRendered('iEn7WMX')) {
    $componentId = $_instance->getRenderedChildComponentId('iEn7WMX');
    $componentTag = $_instance->getRenderedChildComponentTagName('iEn7WMX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('iEn7WMX');
} else {
    $response = \Livewire\Livewire::mount('setting::user.user-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('iEn7WMX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('vzZpYX6')) {
    $componentId = $_instance->getRenderedChildComponentId('vzZpYX6');
    $componentTag = $_instance->getRenderedChildComponentTagName('vzZpYX6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vzZpYX6');
} else {
    $response = \Livewire\Livewire::mount('setting::user.user-sessions');
    $html = $response->html();
    $_instance->logRenderedChild('vzZpYX6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-6 col-xl-3">

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Setting\Resources/views/index.blade.php ENDPATH**/ ?>