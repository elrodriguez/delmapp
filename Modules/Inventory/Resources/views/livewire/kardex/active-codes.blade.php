<div>
    <div class="card mb-g rounded-top">
        <div class="card-header">
            <div class="input-group input-group-multi-transition" wire:ignore.self>
                <div class="input-group-prepend">
                    <button class="btn btn-outline-default dropdown-toggle waves-effect waves-themed" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $show }}</button>
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
                    @if($search)
                        <button wire:click="$set('search', '')" type="button" class="input-group-text bg-transparent border-right-0 py-1 px-3 text-danger">
                            <i class="fal fa-times"></i>
                        </button>
                    @else
                        <span class="input-group-text bg-transparent border-right-0 py-1 px-3 text-success">
                            <i wire:loading.class="spinner-border spinner-border-sm" wire:loading.remove.class="fal fa-search" class="fal fa-search"></i>
                        </span>
                    @endif
                </div>
                <select wire:model.defer="family_id" class="custom-select">
                    <option value="">Seleccionar</option>
                    @foreach($families as $family)
                    <option value="{{ $family->id }}">{{ $family->description }}</option>
                    @endforeach
                </select>
                <select wire:model.defer="brand_id" class="custom-select">
                    <option value="">Seleccionar</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->description }}</option>
                    @endforeach
                </select>
                <input wire:model.defer="search" type="text" class="form-control"  placeholder="@lang('inventory::labels.lbl_type_here')">
                <div class="input-group-append">
                    <button wire:click="getItems" class="btn btn-default waves-effect waves-themed" type="button">@lang('inventory::labels.btn_search')</button>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('labels.category') }}</th>
                        <th>{{ __('labels.brand') }}</th>
                        {{-- <th>{{ __('labels.model') }}</th> --}}
                        <th>{{ __('inventory::labels.lbl_accessory') }}</th>
                        <th>{{ __('labels.description') }}</th>
                        <th>{{ __('labels.code') }}</th>
                        <th>{{ __('inventory::labels.lbl_location') }}</th>
                        <th class="text-center">{{ __('labels.state') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @if(count($items)>0)
                        @foreach ($items as $key => $item)
                            <tr>
                                <td class="align-middle">{{ $key+1 }}</td>
                                <td class="align-middle">{{ $item->category_name }}</td>
                                <td class="align-middle">{{ $item->brand_name }}</td>
                                {{-- <td class="align-middle">{{ $item->model_name }}</td> --}}
                                <td class="align-middle">{{ $item->part_name }}</td>
                                <td class="align-middle">{{ $item->part_description }}</td>
                                <td class="align-middle">{{ $item->patrimonial_code }}</td>
                                <td class="align-middle">{{ $item->location_name }}</td>
                                <td class="align-middle">
                                    @if($item->state)
                                        <span class="badge badge-warning">{{ __('inventory::labels.active') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('inventory::labels.inactive') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">
                                <div class="alert alert-warning mb-0" role="alert">
                                    {{ __('labels.no_data_available_in_the_table') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-footer  pb-0 d-flex flex-row align-items-center" style="margin-bottom: 20px;">
            <div class="ml-auto">{{ $items->links() }}</div>
        </div>
    </div>
</div>
