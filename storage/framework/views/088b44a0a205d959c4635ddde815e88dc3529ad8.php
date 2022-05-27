<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation <?php echo e($errors->any() ? 'was-validated' : ''); ?>" novalidate="">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="establishment"><?php echo app('translator')->get('labels.establishment'); ?> <span
                                class="text-danger">*</span> </label>
                        <select wire:model.defer="establishment_id" class="custom-select" id="establishment">
                            <option value=""><?php echo e(__('labels.to_select')); ?></option>
                            <?php $__currentLoopData = $establishments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $establishment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($establishment->id); ?>"><?php echo e($establishment->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['establishment_id'];
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
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="description"><?php echo app('translator')->get('labels.description'); ?> <span
                                class="text-danger">*</span> </label>
                        <input wire:model.defer="description" type="text" class="form-control" id="description">
                        <?php $__errorArgs = ['description'];
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
                    <div class="col-md-4 mb-3">
                        <label class="form-label"><?php echo app('translator')->get('labels.state'); ?> <span class="text-danger">*</span>
                        </label>
                        <div class="custom-control custom-checkbox">
                            <input wire:model.defer="status" type="checkbox" class="custom-control-input" id="status">
                            <label class="custom-control-label" for="status">Activo</label>
                        </div>
                        <?php $__errorArgs = ['status'];
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

            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="<?php echo e(route('restaurant_floors_list')); ?>" type="button"
                class="btn btn-secondary waves-effect waves-themed"><?php echo e(__('labels.list')); ?></a>
            <button wire:target="update" wire:click="update" wire:loading.attr="disabled" type="button"
                class="btn btn-info ml-auto waves-effect waves-themed"><?php echo e(__('labels.to_update')); ?></button>
        </div>
    </div>
    <script type="text/javascript">
        document.addEventListener('set-floors-save', event => {
            initApp.playSound('<?php echo e(url('themes/smart-admin/media/sound')); ?>', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='<?php echo e(env('BOOTBOX_SUCCESS_ICON')); ?> text-warning mr-2'></i> <span class='text-warning fw-500'>Éxito!</span>",
                message: "<span><strong>Excelente... </strong>" + event.detail.msg + "</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false
            });
            box.find('.modal-content').css({
                'background-color': "<?php echo e(env('BOOTBOX_SUCCESS_COLOR')); ?>"
            });
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\nuevedoce\Modules/Restaurant\Resources/views/livewire/floors/floors-edit.blade.php ENDPATH**/ ?>