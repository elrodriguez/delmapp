
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(url('themes/smart-admin/css/datagrid/datatables/datatables.bundle.css')); ?>">
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
    <li class="breadcrumb-item"><?php echo app('translator')->get('inventory::labels.lbl_inventory'); ?></li>
    <li class="breadcrumb-item"><?php echo app('translator')->get('inventory::labels.lbl_items'); ?></li>
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
        <i class="ni ni-social-dropbox"></i></i> <?php echo app('translator')->get('inventory::labels.lbl_items'); ?><sup class='badge badge-primary fw-500'><?php echo app('translator')->get('inventory::labels.lbl_list'); ?></sup>
    </h1>
    <div class="subheader-block">
        <?php echo app('translator')->get('inventory::labels.lbl_list'); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if($interfaz == '8'): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::item.item-list')->html();
} elseif ($_instance->childHasBeenRendered('MIfnimK')) {
    $componentId = $_instance->getRenderedChildComponentId('MIfnimK');
    $componentTag = $_instance->getRenderedChildComponentTagName('MIfnimK');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MIfnimK');
} else {
    $response = \Livewire\Livewire::mount('inventory::item.item-list');
    $html = $response->html();
    $_instance->logRenderedChild('MIfnimK', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php else: ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::item.item-list-generic')->html();
} elseif ($_instance->childHasBeenRendered('3zeQzUY')) {
    $componentId = $_instance->getRenderedChildComponentId('3zeQzUY');
    $componentTag = $_instance->getRenderedChildComponentTagName('3zeQzUY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3zeQzUY');
} else {
    $response = \Livewire\Livewire::mount('inventory::item.item-list-generic');
    $html = $response->html();
    $_instance->logRenderedChild('3zeQzUY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inventory::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Inventory\Resources/views/item/index.blade.php ENDPATH**/ ?>