
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" media="screen, print"
        href="<?php echo e(url('themes/smart-admin/css/datagrid/datatables/datatables.bundle.css')); ?>">
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
        <?php echo e(__('restaurant::labels.panels')); ?>

    </li>
    <li class="breadcrumb-item active">
        <?php echo e(__('restaurant::labels.tables')); ?>

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
        <?php echo e(__('restaurant::labels.tables')); ?>

        <sup class='badge badge-primary fw-500'>
            <?php echo e(__('labels.list')); ?>

        </sup>
    </h1>
    <div class="subheader-block">
        <?php echo e(__('labels.list')); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div>
        <div id="panel-4" class="panel">
            <div class="panel-hdr border-faded border-top-0 border-right-0 border-left-0 shadow-0">
                <h2>
                    <?php echo e(__('restaurant::labels.waiter')); ?>

                    <span class="fw-300">
                        <i><?php echo e(__('restaurant::labels.panel')); ?></i>
                    </span>
                </h2>
                <div class="panel-toolbar pr-3 align-self-end">
                    <ul id="demo_panel-tabs" class="nav nav-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab_default-1" role="tab"
                                aria-selected="true"><?php echo e(__('restaurant::labels.tables')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a id="tab_order_btn_rest" class="nav-link " data-toggle="tab"
                                href="<?php echo e(session()->has('rest_tab_id') ? session('rest_tab_id') : 'javascript:void(0)'); ?>"
                                role="tab" aria-selected="false"><?php echo e(__('restaurant::labels.order')); ?></a>
                        </li>
                    </ul>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen"
                        data-toggle="tooltip" data-offset="0,10"
                        data-original-title="<?php echo e(__('restaurant::labels.fullscreen')); ?>"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="tab-content p-3">
                        <div class="tab-pane fade active show" id="tab_default-1" role="tabpanel">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('restaurant::attend.attend-tables', [])->html();
} elseif ($_instance->childHasBeenRendered('23FNrWZ')) {
    $componentId = $_instance->getRenderedChildComponentId('23FNrWZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('23FNrWZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('23FNrWZ');
} else {
    $response = \Livewire\Livewire::mount('restaurant::attend.attend-tables', []);
    $html = $response->html();
    $_instance->logRenderedChild('23FNrWZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                        <div class="tab-pane fade" id="tab_default-2" role="tabpanel">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('restaurant::attend.attend-order', [])->html();
} elseif ($_instance->childHasBeenRendered('qX1RlFH')) {
    $componentId = $_instance->getRenderedChildComponentId('qX1RlFH');
    $componentTag = $_instance->getRenderedChildComponentTagName('qX1RlFH');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qX1RlFH');
} else {
    $response = \Livewire\Livewire::mount('restaurant::attend.attend-order', []);
    $html = $response->html();
    $_instance->logRenderedChild('qX1RlFH', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                        <div class="tab-pane fade" id="tab_default-3" role="tabpanel">
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('restaurant::attend.attend-re-order', [])->html();
} elseif ($_instance->childHasBeenRendered('ZVHBb6E')) {
    $componentId = $_instance->getRenderedChildComponentId('ZVHBb6E');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZVHBb6E');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZVHBb6E');
} else {
    $response = \Livewire\Livewire::mount('restaurant::attend.attend-re-order', []);
    $html = $response->html();
    $_instance->logRenderedChild('ZVHBb6E', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url('themes/smart-admin/js/formplugins/select2/select2.bundle.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('restaurant::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nuevedoce\Modules/Restaurant\Resources/views/attend/index.blade.php ENDPATH**/ ?>