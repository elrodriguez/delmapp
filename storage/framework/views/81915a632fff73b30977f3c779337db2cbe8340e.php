
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" media="screen, print"
        href="<?php echo e(url('themes/smart-admin/css/datagrid/datatables/datatables.bundle.css')); ?>">
    <link rel="stylesheet" media="screen, print"
        href="<?php echo e(url('themes/smart-admin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" media="screen, print"
        href="<?php echo e(url('themes/smart-admin/css/formplugins/select2/select2.bundle.css')); ?>">
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
        <?php echo e(__('restaurant::labels.orders_receivable')); ?>

    </li>
    <li class="breadcrumb-item">
        <?php echo e(__('restaurant::labels.charge')); ?>

    </li>
    <li class="breadcrumb-item active"><?php echo app('translator')->get('restaurant::labels.sale_note'); ?></li>
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
        <i class='subheader-icon fal fa-file-invoice-dollar'></i><?php echo e(__('restaurant::labels.sale_note')); ?><sup
            class='badge badge-primary fw-500'><?php echo e(__('labels.new')); ?></sup>
        <small><?php echo app('translator')->get('labels.available_user'); ?></small>
    </h1>
    <div class="subheader-block">
        <?php echo app('translator')->get('labels.new'); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('restaurant::charge.charge-sale-note', ['orderId' => $id,'order_id' => $id])->html();
} elseif ($_instance->childHasBeenRendered('wlnWZgE')) {
    $componentId = $_instance->getRenderedChildComponentId('wlnWZgE');
    $componentTag = $_instance->getRenderedChildComponentTagName('wlnWZgE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wlnWZgE');
} else {
    $response = \Livewire\Livewire::mount('restaurant::charge.charge-sale-note', ['orderId' => $id,'order_id' => $id]);
    $html = $response->html();
    $_instance->logRenderedChild('wlnWZgE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url('themes/smart-admin/js/formplugins/inputmask/inputmask.bundle.js')); ?>"></script>
    <script src="<?php echo e(url('themes/smart-admin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script
        src="<?php echo e(url('themes/smart-admin/js/formplugins/bootstrap-datepicker/locales/bootstrap-datepicker.' . Lang::locale() . '.min.js')); ?>">
    </script>
    <script src="<?php echo e(url('themes/smart-admin/js/formplugins/autocomplete-bootstrap/bootstrap-autocomplete.min.js')); ?>"
        defer></script>
    <script src="<?php echo e(url('themes/smart-admin/js/formplugins/select2/select2.bundle.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Restaurant\Resources/views/charge/sale_note.blade.php ENDPATH**/ ?>