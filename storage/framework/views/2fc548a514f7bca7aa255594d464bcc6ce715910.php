<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('sidebar'); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::sidebar')->html();
} elseif ($_instance->childHasBeenRendered('L8KpFBn')) {
    $componentId = $_instance->getRenderedChildComponentId('L8KpFBn');
    $componentTag = $_instance->getRenderedChildComponentTagName('L8KpFBn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('L8KpFBn');
} else {
    $response = \Livewire\Livewire::mount('inventory::sidebar');
    $html = $response->html();
    $_instance->logRenderedChild('L8KpFBn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\delmapp\Modules/Inventory\Resources/views/layouts/master.blade.php ENDPATH**/ ?>