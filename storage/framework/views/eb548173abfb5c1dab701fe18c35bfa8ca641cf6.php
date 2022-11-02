<?php if (isset($component)) { $__componentOriginald8ab2532cf3b968b70fb6ad8be71f9c9e4669923 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BaseLandlord::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('base-landlord'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\BaseLandlord::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('content'); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('landlord.customer-create', [])->html();
} elseif ($_instance->childHasBeenRendered('k60uCpq')) {
    $componentId = $_instance->getRenderedChildComponentId('k60uCpq');
    $componentTag = $_instance->getRenderedChildComponentTagName('k60uCpq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('k60uCpq');
} else {
    $response = \Livewire\Livewire::mount('landlord.customer-create', []);
    $html = $response->html();
    $_instance->logRenderedChild('k60uCpq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8ab2532cf3b968b70fb6ad8be71f9c9e4669923)): ?>
<?php $component = $__componentOriginald8ab2532cf3b968b70fb6ad8be71f9c9e4669923; ?>
<?php unset($__componentOriginald8ab2532cf3b968b70fb6ad8be71f9c9e4669923); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\delmapp\resources\views/landlord/customer_create.blade.php ENDPATH**/ ?>