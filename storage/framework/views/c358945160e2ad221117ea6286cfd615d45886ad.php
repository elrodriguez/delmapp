
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" media="screen, print"
        href="<?php echo e(url('themes/smart-admin/css/datagrid/datatables/datatables.bundle.css')); ?>">
<?php $__env->stopSection(); ?>
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
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('restaurant_dashboard')); ?>">
            <?php echo e(__('restaurant::labels.module_name')); ?>

        </a>
    </li>
    <li class="breadcrumb-item">
        <?php echo e(__('restaurant::labels.panels')); ?>

    </li>
    <li class="breadcrumb-item ">
        <a href="<?php echo e(route('restaurant_panels_tables')); ?>">
            <?php echo e(__('restaurant::labels.tables')); ?>

        </a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo e(__('restaurant::labels.attend')); ?>

    </li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block">
        <?php if (isset($component)) { $__componentOriginalab70499045def3ea46a51a0c5d10e7b6f1952525 = $component; } ?>
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
<?php endif; ?>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subheader'); ?>
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-file-signature"></i>
        <?php echo e(__('restaurant::labels.attend')); ?>

        <sup class='badge badge-primary fw-500'>
            Pedido
        </sup>
    </h1>
    <div class="subheader-block">
        Pedido
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('restaurant::attend.attend-order', [])->html();
} elseif ($_instance->childHasBeenRendered('CWSjPEQ')) {
    $componentId = $_instance->getRenderedChildComponentId('CWSjPEQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('CWSjPEQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('CWSjPEQ');
} else {
    $response = \Livewire\Livewire::mount('restaurant::attend.attend-order', []);
    $html = $response->html();
    $_instance->logRenderedChild('CWSjPEQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nuevedoce\Modules/Restaurant\Resources/views/attend/attend.blade.php ENDPATH**/ ?>