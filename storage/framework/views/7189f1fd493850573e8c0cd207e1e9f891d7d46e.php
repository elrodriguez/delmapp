
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(url('themes/smart-admin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css')); ?>">
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
    <li class="breadcrumb-item"><?php echo app('translator')->get('lend::labels.module_name'); ?></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('lend_contract_index')); ?>"><?php echo e(__('lend::labels.lbl_contract')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo app('translator')->get('lend::labels.lbl_new'); ?></li>
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
        <i class='subheader-icon fal fa-money-check-alt'></i><?php echo e(__('lend::labels.lbl_contract')); ?> <sup class='badge badge-primary fw-500'><?php echo app('translator')->get('lend::labels.lbl_new'); ?></sup>
        <small><?php echo app('translator')->get('lend::labels.lbl_available_user'); ?></small>
    </h1>
    <div class="subheader-block">
        <?php echo app('translator')->get('lend::labels.lbl_new'); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('lend::contract.contract-create')->html();
} elseif ($_instance->childHasBeenRendered('n3nEHlz')) {
    $componentId = $_instance->getRenderedChildComponentId('n3nEHlz');
    $componentTag = $_instance->getRenderedChildComponentTagName('n3nEHlz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('n3nEHlz');
} else {
    $response = \Livewire\Livewire::mount('lend::contract.contract-create');
    $html = $response->html();
    $_instance->logRenderedChild('n3nEHlz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url('themes/smart-admin/js/formplugins/inputmask/inputmask.bundle.js')); ?>"></script>
    <script src="<?php echo e(url('themes/smart-admin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(url('themes/smart-admin/js/formplugins/bootstrap-datepicker/locales/bootstrap-datepicker.'.Lang::locale().'.min.js')); ?>"></script>
    <script src="<?php echo e(asset('themes/smart-admin/js/formplugins/autocomplete-bootstrap/bootstrap-autocomplete.min.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('lend::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delmapp\Modules/Lend\Resources/views/contract/create.blade.php ENDPATH**/ ?>