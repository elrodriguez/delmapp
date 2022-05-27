<div>
    <div id="panel-4" class="panel">
        <div class="panel-hdr border-faded border-top-0 border-right-0 border-left-0 shadow-0">
            <h2>
                <?php echo e(__('restaurant::labels.order')); ?>

                <span class="fw-300">
                    <i><?php echo e(__('restaurant::labels.panel')); ?></i>
                </span>
            </h2>
            <div class="panel-toolbar pr-3 align-self-end">
                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen"
                    data-toggle="tooltip" data-offset="0,10"
                    data-original-title="<?php echo e(__('restaurant::labels.fullscreen')); ?>"></button>
            </div>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
                <?php if(count($orders) > 0): ?>
                    <?php
                        $order_id = 0;
                    ?>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($order_id != $order['id']): ?>
                            <div class="card mb-g">
                                <div class="card-body pb-0 px-4">
                                    <div class="d-flex flex-row pb-3 pt-2  border-top-0 border-left-0 border-right-0">
                                        <h4 class="mb-0 flex-1 fw-500">
                                            P<?php echo e($order['id']); ?>

                                            <small class="m-0 l-h-n">
                                                <?php if($order['command_state'] == 'P'): ?>
                                                    PENDIENTE
                                                <?php elseif($order['command_state'] == 'C'): ?>
                                                    PREPARANDO
                                                <?php elseif($order['command_state'] == 'M'): ?>
                                                    EN MESA
                                                <?php endif; ?>
                                            </small>
                                        </h4>
                                        <span class="fs-xs opacity-70">
                                            <?php echo e(\Carbon\Carbon::parse($order['order_created_at'])->diffForHumans()); ?>

                                        </span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center"><?php echo e(__('labels.quantity')); ?></th>
                                                    <th><?php echo e(__('restaurant::labels.commands')); ?></th>
                                                    <th><?php echo e(__('labels.detail')); ?></th>
                                                    <th>Servir</th>
                                                    <th><?php echo e(__('labels.state')); ?></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($order['id'] == $item['id']): ?>
                                                        <tr>
                                                            <td class="text-right align-middle">
                                                                <?php echo e(intval($item['quantity'])); ?></td>
                                                            <td class="align-middle">
                                                                <h5 class="m-0">
                                                                    <?php echo e($item['description']); ?>

                                                                    <small class="m-0 l-h-n">
                                                                        <?php echo e(\Carbon\Carbon::parse($order['command_created_at'])->diffForHumans()); ?>

                                                                    </small>
                                                                </h5>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?php echo e($item['details']); ?>

                                                            </td>
                                                            <td class="align-middle">
                                                                <?php if($item['command_local']): ?>
                                                                    Aquí
                                                                <?php else: ?>
                                                                    <?php echo e(__('restaurant::labels.to_carry_out')); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?php if($item['command_state'] == 'P'): ?>
                                                                    <h1><span
                                                                            class="badge badge-danger">PENDIENTE</span>
                                                                    </h1>
                                                                <?php elseif($item['command_state'] == 'C'): ?>
                                                                    <h1><span
                                                                            class="badge badge-warning">PREPARANDO</span>
                                                                    </h1>
                                                                <?php else: ?>
                                                                    <h1><span class="badge badge-primary">SERVIDO</span>
                                                                    </h1>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-right align-middle">
                                                                <div class="btn-group btn-group-lg btn-block">
                                                                    <button type="button"
                                                                        wire:click="commandState(<?php echo e($item['id']); ?>,<?php echo e($item['command_id']); ?>,'C')"
                                                                        class="btn btn-secondary waves-effect waves-themed">Preparando</button>
                                                                    <button type="button"
                                                                        wire:click="commandState(<?php echo e($item['id']); ?>,<?php echo e($item['command_id']); ?>,'S')"
                                                                        class="btn btn-secondary waves-effect waves-themed">Servido</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" class="text-right align-middle">
                                                        <span><?php echo e(__('restaurant::labels.waiter')); ?>:
                                                            <?php echo e($order['full_name']); ?></span>
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <button wire:click="orderState(<?php echo e($order['id']); ?>)"
                                                            class="btn btn-primary btn-lg btn-block waves-effect waves-themed">
                                                            <i class="fal fa-check fs-xs mr-1"></i>
                                                            <span>TERMINADO</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <?php $__currentLoopData = $order['array_tables']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $array_table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="position-relative js-waves-off" style="width: 55px;">
                                            <img
                                                src="<?php echo e(url('themes/smart-admin/img/icon-png/icons8-mesa-50.png')); ?>">
                                            <span
                                                class="badge border border-light rounded-pill bg-success-700 position-absolute pos-bottom pos-right"><?php echo e($array_table['name']); ?></span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php
                                $order_id = $order['id'];
                            ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="alert alert-info">
                        <h2 class="text-center">Aún no hay más pedidos</h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\delmapp\Modules/Restaurant\Resources/views/livewire/orders/orders-list.blade.php ENDPATH**/ ?>