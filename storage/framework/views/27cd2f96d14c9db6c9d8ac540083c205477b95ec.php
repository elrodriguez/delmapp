
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
    <li class="breadcrumb-item"><a href="<?php echo e(route('inventory_item')); ?>"><?php echo app('translator')->get('inventory::labels.lbl_items'); ?></a></li>
    <li class="breadcrumb-item active"><?php echo app('translator')->get('inventory::labels.btn_edit'); ?></li>
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
        <i class="ni ni-social-dropbox"></i> <?php echo app('translator')->get('inventory::labels.btn_edit'); ?> <span class='fw-300'><?php echo app('translator')->get('inventory::labels.lbl_item'); ?></span> <sup class='badge badge-primary fw-500'><?php echo app('translator')->get('inventory::labels.btn_edit'); ?></sup>

    </h1>
    <div class="subheader-block">
        <?php echo app('translator')->get('inventory::labels.btn_edit'); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if($interfaz == '8'): ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::item.item-edit',['item_id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('OI4Ie4f')) {
    $componentId = $_instance->getRenderedChildComponentId('OI4Ie4f');
    $componentTag = $_instance->getRenderedChildComponentTagName('OI4Ie4f');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OI4Ie4f');
} else {
    $response = \Livewire\Livewire::mount('inventory::item.item-edit',['item_id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('OI4Ie4f', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php else: ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('inventory::item.item-edit-generic', ['itemId' => $id,'item_id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('rBjTwvr')) {
    $componentId = $_instance->getRenderedChildComponentId('rBjTwvr');
    $componentTag = $_instance->getRenderedChildComponentTagName('rBjTwvr');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rBjTwvr');
} else {
    $response = \Livewire\Livewire::mount('inventory::item.item-edit-generic', ['itemId' => $id,'item_id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('rBjTwvr', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('themes/smart-admin/js/formplugins/inputmask/inputmask.bundle.js')); ?>"></script>
<script src="<?php echo e(url('themes/smart-admin/js/formplugins/autocomplete-bootstrap/bootstrap-autocomplete.min.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('inventory::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Inventory\Resources/views/item/edit.blade.php ENDPATH**/ ?>