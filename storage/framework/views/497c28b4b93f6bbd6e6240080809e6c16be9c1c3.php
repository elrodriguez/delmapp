<div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-8 col-lg-8 mb-3">
            <div class="card border  m-auto m-lg-0">
                <div class="card-header">
                    Platos y bebidas
                </div>
                <div class="card-body p-0">
                    <div class="p-3 mb-3" style="max-width:729px;overflow-x: auto;white-space: nowrap;">
                        <button type="button" wire:click="$set('category_id',0)"
                            class="btn btn-lg btn-success waves-effect waves-themed"><?php echo e(__('labels.all')); ?></button>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button type="button" wire:click="$set('category_id',<?php echo e($category->id); ?>)"
                                class="btn btn-lg btn-primary waves-effect waves-themed"><?php echo e($category->description); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div style="max-height:400px;overflow-x: auto;">
                        <table class="table table-hover m-0">
                            <?php $__currentLoopData = $commands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $command): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr wire:click="addCommands(<?php echo e($command->id); ?>,'<?php echo e($command->description); ?>','<?php echo e($command->price); ?>')"
                                    style="cursor: pointer">
                                    <td>
                                        <?php if($command->image): ?>
                                            <img src="<?php echo e(url($command->image)); ?>" alt="comanda" width="80px"
                                                class="img-thumbnail img-responsive rounded-circle"
                                                style="width:5rem; height: 5rem;">
                                        <?php else: ?>
                                            <img src="img/demo/authors/sunny.png" alt="comanda"
                                                class="img-thumbnail img-responsive rounded-circle"
                                                style="width:5rem; height: 5rem;">
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="ml-2 mr-3">
                                                <h5 class="m-0">
                                                    <?php echo e($command->description); ?>

                                                    <small class="m-0 fw-300">
                                                        PRECIO: <b><?php echo e($command->price); ?></b>
                                                    </small>
                                                </h5>
                                                <small class="text-info fs-sm">CÓDIGO:
                                                    <?php echo e($command->internal_id); ?></small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
            <div class="card border m-auto m-lg-0">
                <div class="card-header">
                    Productos / stock
                </div>
                <div class="p-0" style="overflow-y: auto;max-height: 200px;">
                    <div class="list-group">
                        <?php if(count($items) > 0): ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a wire:click="addProducts(<?php echo e($item->id); ?>,'<?php echo e($item->name); ?>','<?php echo e($item->price); ?>')"
                                    href="javascript:void(0)" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1"><?php echo e($item->name); ?>

                                            <small class="m-0 fw-300">
                                                PRECIO: <b><?php echo e($item->price); ?></b>
                                            </small>
                                        </h5>
                                        <small class="text-muted"><?php echo e($item->stock); ?></small>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($table): ?>
                <button type="button" class="btn btn-primary btn-block btn-lg mt-3" data-toggle="modal"
                    data-target="#modalOrderReDetails">
                    Pedido Mesa: <?php echo e($table['name']); ?> / Items: <?php echo e(count($order_items)); ?>

                </button>
            <?php else: ?>
                <button onclick="returnTables()" type="button" class="btn btn-info btn-block btn-lg mt-3">
                    Elejir mesa
                </button>
            <?php endif; ?>

        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalOrderReDetails" tabindex="-1"
        aria-labelledby="modalOrderReDetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalOrderReDetailsLabel">
                        <?php if($table): ?>
                            Pedido Mesa: <?php echo e($table['name']); ?>

                        <?php else: ?>
                            Elejir mesa
                        <?php endif; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-12 col-sm-8 col-md-8 col-lg-6">
                            <label>Cliente</label>
                            <input wire:model="client" type="text" class="form-control">
                        </div>
                        <div class="col-12 col-sm-8 col-md-8 col-lg-6">
                            <label>Mesas</label>
                            <select id="retable_ids" name="retable_ids[]" multiple="multiple">
                                <?php $__currentLoopData = $xtables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $xtable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($xtable->id); ?>"><?php echo e($xtable->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <table class="table">
                            <?php
                                $c = 1;
                            ?>
                            <?php if(count($order_items) > 0): ?>
                                <?php $__currentLoopData = $order_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $order_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="<?php echo e($c % 2 == 0 ? 'table-primary' : 'table-warning'); ?>">
                                        <td class="align-middle text-center">
                                            <button wire:click="removeItems(<?php echo e($i); ?>)"
                                                class="btn btn-danger btn-icon waves-effect waves-themed">
                                                <i class="fal fa-times"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <h5 class="mb-1"><?php echo e($order_item['name']); ?></h5>
                                            <small><?php echo e(\Carbon\Carbon::parse($order_item['requested_time'])->diffForHumans()); ?></small>
                                        </td>
                                        <td class="align-middle">
                                            <textarea wire:model="order_items.<?php echo e($i); ?>.details" rows="1" class="form-control"
                                                placeholder="<?php echo e(__('labels.detail')); ?>"></textarea>
                                        </td>
                                        <td class="align-middle text-right">
                                            <?php echo e($order_item['price']); ?>

                                        </td>
                                        <td class="align-middle " width="80px">
                                            <input wire:model="order_items.<?php echo e($i); ?>.quantity" type="text"
                                                class="form-control text-right"
                                                placeholder="<?php echo e(__('labels.quantity')); ?>">
                                            <?php $__errorArgs = ['order_items.' . $i . '.quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </td>
                                        <td class="align-middle text-right">
                                            <?php echo e($order_item['subtotal']); ?>

                                        </td>
                                    </tr>
                                    <?php
                                        $c++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="p-3">
                                            <div class="alert alert-info text-center m-0">Sin Items</div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th class="text-right" colspan="5">
                                    TOTAL
                                </th>
                                <th class="text-right">
                                    <?php echo e(number_format($total, 2, '.', '')); ?>

                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal"><?php echo e(__('labels.close')); ?></button>
                    <button wire:click="removeAllItems" type="button"
                        class="btn btn-danger"><?php echo e(__('labels.cancel')); ?> Pedido</button>
                    <button onclick="saveRestOrder()" wire:target="saveOrder" type="button" class="btn btn-primary">
                        <i class="fal fa-location-arrow mr-1"></i>Pedir
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('restaurant-active-re-orders', event => {
            let sval = event.detail.tables_ids;
            console.log(sval);
            $('a[href="#tab_default-3"]').click();
            $("#retable_ids").val(sval);
        });
        document.addEventListener('rest-reselect2', event => {
            $('#retable_ids').select2();
        });
        document.addEventListener('livewire:load', function() {
            $('#retable_ids').select2();
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\nuevedoce\Modules/Restaurant\Resources/views/livewire/attend/attend-re-order.blade.php ENDPATH**/ ?>