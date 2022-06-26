<div>
    <div class="container page__container">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('landlord_dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('landlord_customer')); ?>">Clientes</a></li>
            <li class="breadcrumb-item active">Nuevo</li>
        </ol>
    </div>
    <div class="container page__container page-section">
        <div class="card card-body mb-32pt">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="card-title">Nuevo Clientes</h4>
                    <a href="<?php echo e(route('landlord_customer')); ?>" class="btn btn-primary">Atras</a>
                </div>
                <div class="col-lg-8">
                    <form>
                        <div class="<?php echo e($errors->any() ? 'was-validated' : ''); ?>">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="company_name">Nombre Empresa</label>
                                    <input wire:model.defer="company_name" type="text" class="form-control" id="company_name" required="">
                                    <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="number_ruc">N. RUC</label>
                                    <input wire:model.defer="number_ruc" type="text" class="form-control" id="number_ruc" required="">
                                    <?php $__errorArgs = ['number_ruc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="email">Email <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="email" type="text" class="form-control" id="email" required="">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="tradename"><?php echo app('translator')->get('setting::labels.tradename'); ?> <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="tradename" type="text" class="form-control" id="tradename" required="">
                                    <?php $__errorArgs = ['tradename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="phone">Teléfono fijo <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="phone" type="text" class="form-control" id="phone" required="">
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="phone_mobile">Teléfono móvil <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="phone_mobile" type="text" class="form-control" id="phone_mobile" required="">
                                    <?php $__errorArgs = ['phone_mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="representative_name">Nombre del representante <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="representative_name" type="text" class="form-control" id="representative_name" required="">
                                    <?php $__errorArgs = ['representative_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="representative_number">Número de identificación <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="representative_number" type="text" class="form-control" id="representative_number" required="">
                                    <?php $__errorArgs = ['representative_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <hr>
                            <h4>Datos del Sistema</h4>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="database_name">Nombre Base de Datos<span class="text-danger">*</span> </label>
                                    <input wire:model.defer="database_name" type="text" class="form-control" id="database_name" required="">
                                    <?php $__errorArgs = ['database_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="subdomain">Nombre Sub Dominio<span class="text-danger">*</span> </label>
                                    <input wire:model.defer="subdomain" type="text" class="form-control" id="subdomain" required="">
                                    <?php $__errorArgs = ['subdomain'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <button wire:loading.remove wire:loading.attr="disabled" wire:click="save" type="button" class="btn btn-primary">
                            <?php echo e(__('labels.save')); ?>

                        </button>
                        <button style="display:none" wire:target="save" wire:loading class="btn btn-primary" type="button" disabled="">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <?php echo e($this->loading_msg); ?>...
                        </button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\delmapp\resources\views/livewire/landlord/customer-create.blade.php ENDPATH**/ ?>