
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
} elseif ($_instance->childHasBeenRendered('9GcSICm')) {
    $componentId = $_instance->getRenderedChildComponentId('9GcSICm');
    $componentTag = $_instance->getRenderedChildComponentTagName('9GcSICm');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9GcSICm');
} else {
    $response = \Livewire\Livewire::mount('setting::company.company-data');
    $html = $response->html();
    $_instance->logRenderedChild('9GcSICm', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-6 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::establishment.establishment-quantity')->html();
} elseif ($_instance->childHasBeenRendered('VTV8cJI')) {
    $componentId = $_instance->getRenderedChildComponentId('VTV8cJI');
    $componentTag = $_instance->getRenderedChildComponentTagName('VTV8cJI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VTV8cJI');
} else {
    $response = \Livewire\Livewire::mount('setting::establishment.establishment-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('VTV8cJI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('9Wqz8ol')) {
    $componentId = $_instance->getRenderedChildComponentId('9Wqz8ol');
    $componentTag = $_instance->getRenderedChildComponentTagName('9Wqz8ol');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9Wqz8ol');
} else {
    $response = \Livewire\Livewire::mount('setting::roles.roles-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('9Wqz8ol', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::modules.module-quantity')->html();
} elseif ($_instance->childHasBeenRendered('xmzoBoQ')) {
    $componentId = $_instance->getRenderedChildComponentId('xmzoBoQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('xmzoBoQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xmzoBoQ');
} else {
    $response = \Livewire\Livewire::mount('setting::modules.module-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('xmzoBoQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-4 col-xl-3">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('setting::user.user-quantity')->html();
} elseif ($_instance->childHasBeenRendered('qF3I9fG')) {
    $componentId = $_instance->getRenderedChildComponentId('qF3I9fG');
    $componentTag = $_instance->getRenderedChildComponentTagName('qF3I9fG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qF3I9fG');
} else {
    $response = \Livewire\Livewire::mount('setting::user.user-quantity');
    $html = $response->html();
    $_instance->logRenderedChild('qF3I9fG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('lPsj30d')) {
    $componentId = $_instance->getRenderedChildComponentId('lPsj30d');
    $componentTag = $_instance->getRenderedChildComponentTagName('lPsj30d');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lPsj30d');
} else {
    $response = \Livewire\Livewire::mount('setting::user.user-sessions');
    $html = $response->html();
    $_instance->logRenderedChild('lPsj30d', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-sm-6 col-xl-3">

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('setting::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Setting\Resources/views/index.blade.php ENDPATH**/ ?>