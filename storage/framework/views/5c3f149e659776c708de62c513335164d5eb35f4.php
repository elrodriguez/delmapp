<?php if (isset($component)) { $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BaseLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('base-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\BaseLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('content'); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('welcome', [])->html();
} elseif ($_instance->childHasBeenRendered('gcj2IdJ')) {
    $componentId = $_instance->getRenderedChildComponentId('gcj2IdJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('gcj2IdJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gcj2IdJ');
} else {
    $response = \Livewire\Livewire::mount('welcome', []);
    $html = $response->html();
    $_instance->logRenderedChild('gcj2IdJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php $__env->stopSection(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a)): ?>
<?php $component = $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a; ?>
<?php unset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a); ?>
<?php endif; ?>

<?php /**PATH C:\laragon\www\delmapp\resources\views/welcome.blade.php ENDPATH**/ ?>