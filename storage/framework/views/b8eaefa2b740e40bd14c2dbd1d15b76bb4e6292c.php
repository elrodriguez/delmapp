<div>
    <div class="card mb-g rounded-top">
        <div class="card-header">
            <div class="input-group input-group-multi-transition" wire:ignore.self>
                <div class="input-group-prepend">
                    <button class="btn btn-outline-default dropdown-toggle waves-effect waves-themed" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($show); ?></button>
                    <div class="dropdown-menu" style="">
                        <button class="dropdown-item" wire:click="$set('show', 10)">10</button>
                        <button class="dropdown-item" wire:click="$set('show', 20)">20</button>
                        <button class="dropdown-item" wire:click="$set('show', 50)">50</button>
                        <div role="separator" class="dropdown-divider"></div>
                        <button class="dropdown-item" wire:click="$set('show', 100)">100</button>
                        <button class="dropdown-item" wire:click="$set('show', 500)">500</button>
                    </div>
                </div>
                <div class="input-group-prepend">
                    <?php if($search): ?>
                        <button wire:click="$set('search', '')" type="button" class="input-group-text bg-transparent border-right-0 py-1 px-3 text-danger">
                            <i class="fal fa-times"></i>
                        </button>
                    <?php else: ?>
                        <span class="input-group-text bg-transparent border-right-0 py-1 px-3 text-success">
                            <i wire:loading.class="spinner-border spinner-border-sm" wire:loading.remove.class="fal fa-search" class="fal fa-search"></i>
                        </span>
                    <?php endif; ?>
                </div>
                <select wire:model.defer="family_id" class="custom-select">
                    <option value="">Seleccionar</option>
                    <?php $__currentLoopData = $families; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $family): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($family->id); ?>"><?php echo e($family->description); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <select wire:model.defer="brand_id" class="custom-select">
                    <option value="">Seleccionar</option>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->description); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input wire:model.defer="search" type="text" class="form-control"  placeholder="<?php echo app('translator')->get('inventory::labels.lbl_type_here'); ?>">
                <div class="input-group-append">
                    <button wire:click="getItems" class="btn btn-default waves-effect waves-themed" type="button"><?php echo app('translator')->get('inventory::labels.btn_search'); ?></button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo e(__('labels.category')); ?></th>
                        <th><?php echo e(__('labels.brand')); ?></th>
                        
                        <th><?php echo e(__('inventory::labels.lbl_accessory')); ?></th>
                        <th><?php echo e(__('labels.description')); ?></th>
                        <th><?php echo e(__('labels.code')); ?></th>
                        <th><?php echo e(__('inventory::labels.lbl_location')); ?></th>
                        <th class="text-center"><?php echo e(__('labels.state')); ?></th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php if(count($items)>0): ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="align-middle"><?php echo e($key+1); ?></td>
                                <td class="align-middle"><?php echo e($item->category_name); ?></td>
                                <td class="align-middle"><?php echo e($item->brand_name); ?></td>
                                
                                <td class="align-middle"><?php echo e($item->part_name); ?></td>
                                <td class="align-middle"><?php echo e($item->part_description); ?></td>
                                <td class="align-middle"><?php echo e($item->patrimonial_code); ?></td>
                                <td class="align-middle"><?php echo e($item->location_name); ?></td>
                                <td class="align-middle"><?php echo e($item->state); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="alert alert-warning mb-0" role="alert">
                                    <?php echo e(__('labels.no_data_available_in_the_table')); ?>

                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer  pb-0 d-flex flex-row align-items-center" style="margin-bottom: 20px;">
            <div class="ml-auto"><?php echo e($items->links()); ?></div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\delmapp\Modules/Inventory\Resources/views/livewire/kardex/active-codes.blade.php ENDPATH**/ ?>