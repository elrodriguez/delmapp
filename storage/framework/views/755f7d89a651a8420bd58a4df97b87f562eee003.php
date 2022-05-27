<div>
    <div class="card mb-g rounded-top">
        <div class="card-header">
            <div class="input-group bg-white shadow-inset-2">
                <div class="input-group-prepend">
                    <?php if($search): ?>
                        <button wire:click="$set('search', '')" type="button"
                            class="input-group-text bg-transparent border-right-0 py-1 px-3 text-danger">
                            <i class="fal fa-times"></i>
                        </button>
                    <?php else: ?>
                        <span class="input-group-text bg-transparent border-right-0 py-1 px-3 text-success">
                            <i wire:target="search" wire:loading.class="spinner-border spinner-border-sm"
                                wire:loading.remove.class="fal fa-search" class="fal fa-search"></i>
                        </span>
                    <?php endif; ?>
                </div>
                <input wire:keydown.enter="ordersSearch" wire:model.defer="search" type="text"
                    class="form-control border-left-0 bg-transparent pl-0" placeholder="Escriba aquí...">
                <div class="input-group-append">
                    <button wire:click="ordersSearch" class="btn btn-default waves-effect waves-themed"
                        type="button">Buscar</button>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurante_administracion_categorias_nuevo')): ?>
                        <a href="<?php echo e(route('restaurant_categories_create')); ?>"
                            class="btn btn-success waves-effect waves-themed" type="button"><?php echo e(__('labels.new')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"><?php echo e(__('labels.actions')); ?></th>
                        <th><?php echo e(__('labels.code')); ?></th>
                        <th><?php echo e(__('labels.customer')); ?></th>
                        <th><?php echo e(__('restaurant::labels.waiter')); ?></th>
                        <th><?php echo e(__('restaurant::labels.order')); ?></th>
                        <th><?php echo e(__('labels.total')); ?></th>
                        <th><?php echo e(__('labels.type')); ?></th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php if(count($orders) > 0): ?>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center align-middle"><?php echo e($key + 1); ?></td>
                                <td class="text-center align-middle">
                                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                        <a href="<?php echo e(route('restaurant_panels_charge_sale_note', $order->id)); ?>"
                                            type="button" class="btn btn-dark waves-effect waves-themed">Nota
                                            de Venta</a>
                                        <?php if($btnVouchers): ?>
                                            <button type="button" class="btn btn-info waves-effect waves-themed">Boleta
                                                Electrónica</button>
                                            <button type="button"
                                                class="btn btn-primary waves-effect waves-themed">Factura
                                                Electrónica</button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="align-middle">P<?php echo e($order->id); ?></td>
                                <td class="align-middle"><?php echo e($order->customer_person_name); ?></td>
                                <td class="align-middle"><?php echo e($order->full_name); ?></td>
                                <td class="align-middle">
                                    <?php echo e(\Carbon\Carbon::parse($order->created_at)->diffForHumans()); ?>

                                </td>
                                <td class="align-middle"><?php echo e($order->total); ?></td>
                                <td class="align-middle">
                                    <?php if($order->order_type == 'L'): ?>
                                        <span class="badge badge-warning"><?php echo e(__('restaurant::labels.local')); ?></span>
                                    <?php else: ?>
                                        <span
                                            class="badge badge-danger"><?php echo e(__('restaurant::labels.to_carry_out')); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="dataTables_empty text-center" valign="top">
                                <?php echo e(__('labels.no_records_to_display')); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript"></script>
</div>
<?php /**PATH C:\laragon\www\delmapp\Modules/Restaurant\Resources/views/livewire/charge/charge-order-list.blade.php ENDPATH**/ ?>