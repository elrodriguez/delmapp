<div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label class="form-label" for="floor">
                <?php echo app('translator')->get('restaurant::labels.floor'); ?>
                <span class="text-danger">*</span>
            </label>
            <select wire:model.defer="floor_id" class="custom-select">
                <option value=""><?php echo e(__('labels.to_select')); ?></option>
                <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $floor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($floor->id); ?>"><?php echo e($floor->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['floor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback-2"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="row">
        <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($table->occupied): ?>
                <div onclick="openFormReOrder(<?php echo e($table->id); ?>)" class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3"
                    style="cursor: pointer">
                    <div class="p-3 bg-danger-800  rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <?php echo e($table->name); ?>

                                <small class="m-0 l-h-n">
                                    Sillas : <?php echo e($table->chairs); ?>

                                </small>
                            </h3>
                            <code class="mt-2 l-h-n">
                                ocupado
                            </code>
                        </div>
                        <i class="fal fa-table position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
            <?php else: ?>
                <div onclick="openFormOrder(<?php echo e($table->id); ?>)" class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3"
                    style="cursor: pointer">
                    <div class="p-3 bg-warning-500 rounded overflow-hidden position-relative text-white mb-g">
                        <div class="">
                            <h3 class="display-4 d-block l-h-n m-0 fw-500">
                                <?php echo e($table->name); ?>

                                <small class="m-0 l-h-n">
                                    Sillas : <?php echo e($table->chairs); ?>

                                </small>
                            </h3>
                            <code class="mt-2 l-h-n">
                                libre
                            </code>
                        </div>
                        <i class="fal fa-table position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1"
                            style="font-size:6rem"></i>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <script>
        function openFormOrder(id) {
            let b = document.getElementById('tab_order_btn_rest');
            b.setAttribute("href", "#tab_default-2");
            window.livewire.find('<?php echo e($_instance->id); ?>').emit('showFormOrder', id);
        }

        function openFormReOrder(id) {
            let b = document.getElementById('tab_order_btn_rest');
            b.setAttribute("href", "#tab_default-3");
            window.livewire.find('<?php echo e($_instance->id); ?>').emit('showFormReOrder', id);
        }
        document.addEventListener('restaurant-set-free-table', event => {

            initApp.playSound('<?php echo e(url('themes/smart-admin/media/sound')); ?>', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='<?php echo e(env('BOOTBOX_WARNING_ICON')); ?> text-danger mr-2'></i> ¿Desea liberar mesa?",
                message: "<span><strong>Advertencia: </strong> ¡Ya no puede agregar más pedidos a la mesa!</span>",
                centerVertical: true,
                swapButtonOrder: true,
                buttons: {
                    confirm: {
                        label: 'Si',
                        className: 'btn-danger shadow-0'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-default'
                    }
                },
                className: "modal-alert",
                closeButton: false,
                callback: function(result) {
                    if (result) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').updateStateTable(event.detail.orderId)
                    }
                }
            });
            box.find('.modal-content').css({
                'background-color': "<?php echo e(env('BOOTBOX_WARNING_COLOR')); ?>"
            });
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\delmapp\Modules/Restaurant\Resources/views/livewire/attend/attend-tables.blade.php ENDPATH**/ ?>