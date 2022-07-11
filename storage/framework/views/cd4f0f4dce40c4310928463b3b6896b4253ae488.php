<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalUserEstablisment" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 wire:ignore class="modal-title" id="modalUserEstablismentLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="establishment"><?php echo e(__('labels.establishment')); ?></label>
                        <select wire:model.defer="establishment_id" class="custom-select">
                            <option value=""><?php echo e(__('labels.to_select')); ?></option>
                            <?php $__currentLoopData = $establishments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $establisment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($establisment->id); ?>"><?php echo e($establisment->name); ?></option>
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
                    <div class="mt-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" wire:model.defer="main"
                                id="defaultChecked">
                            <label class="custom-control-label" for="defaultChecked">Trabajará aquí hoy?</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button wire:click="save" type="button"
                            class="btn btn-primary"><?php echo e(__('labels.add')); ?></button>
                    </div>

                    <div class="mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('labels.actions')); ?></th>
                                    <th scope="col"><?php echo e(__('labels.establishment')); ?></th>
                                    <th scope="col"><?php echo e(__('labels.state')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($user_establishments) > 0): ?>
                                    <?php $__currentLoopData = $user_establishments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="align-middle text-center" width="10%">
                                                <button
                                                    class="btn btn-default btn-sm btn-icon rounded-circle waves-effect waves-themed"
                                                    wire:click="delete(<?php echo e($item->id); ?>)" type="button">
                                                    <i class="fal fa-trash-alt"></i>
                                                </button>
                                            </td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td>
                                                <div class="custom-control custom-switch">

                                                    <?php if($item->main): ?>
                                                        <input wire:change="inactiveMain(<?php echo e($item->id); ?>)"
                                                            <?php echo e($item->main ? 'checked' : ''); ?> type="checkbox"
                                                            class="custom-control-input"
                                                            id="customSwitch2<?php echo e($k); ?>">
                                                        <label class="custom-control-label"
                                                            for="customSwitch2<?php echo e($k); ?>"><?php echo e(__('labels.active')); ?></label>
                                                    <?php else: ?>
                                                        <input wire:change="activeMain(<?php echo e($item->id); ?>)"
                                                            <?php echo e($item->main ? 'checked' : ''); ?> type="checkbox"
                                                            class="custom-control-input"
                                                            id="customSwitch2<?php echo e($k); ?>">
                                                        <label class="custom-control-label"
                                                            for="customSwitch2<?php echo e($k); ?>"><?php echo e(__('labels.inactive')); ?></label>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center">No tiene establesimientos</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal"><?php echo e(__('labels.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('open-modal-user-establishment', event => {
            $('#modalUserEstablismentLabel').html(event.detail.user_name);
            $('#modalUserEstablisment').modal('show');
        });
        document.addEventListener('set-user-establishment-save', event => {
            initApp.playSound('<?php echo e(url('themes/smart-admin/media/sound')); ?>', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'>Éxito!</span>",
                message: "<span><strong>Excelente... </strong>" + event.detail.msg + "</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false
            });
            box.find('.modal-content').css({
                'background-color': 'rgba(122, 85, 7, 0.5)'
            });
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\delmapp\Modules/Setting\Resources/views/livewire/user/user-establishment.blade.php ENDPATH**/ ?>