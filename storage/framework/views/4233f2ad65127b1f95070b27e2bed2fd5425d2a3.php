<div>
    <div>
        <div class="card mb-g rounded-top">
            <div class="card-header">
                <?php echo e(__('setting::labels.user')); ?>: <?php echo e($user_name); ?>

            </div>
            <div class="card-body">
                <div class="row">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="card d-flex flex-row p-2 mb-2 align-items-stretch">
                                <div class=" pr-2 flex-shrink-0 flex-grow-0" style="max-width: 50px">
                                    <i class="fal fa-2x fa-key" style="color: #A0280F"></i>
                                </div>
                                <div class="d-flex flex-column flex-grow-1 flex-shrink-0 w-50 justify-content-between">
                                    <div class="text-truncate"><?php echo e($role->name); ?></div>
                                    <div class="small" wire:ignore>
                                        <b><span class="amount_to_localize"><?php echo e($role->quantity); ?></span></b> / <?php echo e(__('setting::labels.permissions')); ?>

                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-between align-items-center">
                                    <div class="custom-control custom-checkbox custom-checkbox-circle">
                                        <input wire:change="assignRole(<?php echo e($role->id); ?>,'<?php echo e($role->name); ?>')" wire:model.defer="checked.<?php echo e($role->id); ?>" type="checkbox" class="custom-control-input" id="checked-<?php echo e($role->id); ?>">
                                        <label class="custom-control-label" for="checked-<?php echo e($role->id); ?>"></label>
                                    </div>
                                </div>
                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="card-footer d-flex flex-row align-items-center">
                <a href="<?php echo e(route('setting_users')); ?>" type="button" class="btn btn-secondary waves-effect waves-themed">Listado</a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\delmapp\Modules/Setting\Resources/views/livewire/user/user-roles.blade.php ENDPATH**/ ?>