
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
    <li class="breadcrumb-item"><?php echo e(__('sales::labels.module_name')); ?></li>
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
    $html = \Livewire\Livewire::mount('sales::dashboard.total-expense', [])->html();
} elseif ($_instance->childHasBeenRendered('9F9DkN9')) {
    $componentId = $_instance->getRenderedChildComponentId('9F9DkN9');
    $componentTag = $_instance->getRenderedChildComponentTagName('9F9DkN9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9F9DkN9');
} else {
    $response = \Livewire\Livewire::mount('sales::dashboard.total-expense', []);
    $html = $response->html();
    $_instance->logRenderedChild('9F9DkN9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('sales::dashboard.total-sales', [])->html();
} elseif ($_instance->childHasBeenRendered('c8m4IlU')) {
    $componentId = $_instance->getRenderedChildComponentId('c8m4IlU');
    $componentTag = $_instance->getRenderedChildComponentTagName('c8m4IlU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('c8m4IlU');
} else {
    $response = \Livewire\Livewire::mount('sales::dashboard.total-sales', []);
    $html = $response->html();
    $_instance->logRenderedChild('c8m4IlU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12 col-sm-6">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('sales::dashboard.total-document', [])->html();
} elseif ($_instance->childHasBeenRendered('ZNXJLoC')) {
    $componentId = $_instance->getRenderedChildComponentId('ZNXJLoC');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZNXJLoC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZNXJLoC');
} else {
    $response = \Livewire\Livewire::mount('sales::dashboard.total-document', []);
    $html = $response->html();
    $_instance->logRenderedChild('ZNXJLoC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
        <div class="col-12 col-sm-6">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('sales::dashboard.series', [])->html();
} elseif ($_instance->childHasBeenRendered('2Y2SPWs')) {
    $componentId = $_instance->getRenderedChildComponentId('2Y2SPWs');
    $componentTag = $_instance->getRenderedChildComponentTagName('2Y2SPWs');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2Y2SPWs');
} else {
    $response = \Livewire\Livewire::mount('sales::dashboard.series', []);
    $html = $response->html();
    $_instance->logRenderedChild('2Y2SPWs', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(url('themes/smart-admin/js/statistics/flot/flot.bundle.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sales::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Sales\Resources/views/index.blade.php ENDPATH**/ ?>