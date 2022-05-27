<div>
    <div class="card mb-g rounded-top">
        <div class="card-header">
            <div class="input-group bg-white shadow-inset-2">
                <div class="input-group-prepend">
                    @if ($search)
                        <button wire:click="$set('search', '')" type="button"
                            class="input-group-text bg-transparent border-right-0 py-1 px-3 text-danger">
                            <i class="fal fa-times"></i>
                        </button>
                    @else
                        <span class="input-group-text bg-transparent border-right-0 py-1 px-3 text-success">
                            <i wire:target="search" wire:loading.class="spinner-border spinner-border-sm"
                                wire:loading.remove.class="fal fa-search" class="fal fa-search"></i>
                        </span>
                    @endif
                </div>
                <input wire:keydown.enter="ordersSearch" wire:model.defer="search" type="text"
                    class="form-control border-left-0 bg-transparent pl-0" placeholder="Escriba aquí...">
                <div class="input-group-append">
                    <button wire:click="ordersSearch" class="btn btn-default waves-effect waves-themed"
                        type="button">Buscar</button>
                    @can('restaurante_administracion_categorias_nuevo')
                        <a href="{{ route('restaurant_categories_create') }}"
                            class="btn btn-success waves-effect waves-themed" type="button">{{ __('labels.new') }}</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('labels.actions') }}</th>
                        <th>{{ __('labels.code') }}</th>
                        <th>{{ __('labels.customer') }}</th>
                        <th>{{ __('restaurant::labels.waiter') }}</th>
                        <th>{{ __('restaurant::labels.order') }}</th>
                        <th>{{ __('labels.total') }}</th>
                        <th>{{ __('labels.type') }}</th>
                    </tr>
                </thead>
                <tbody class="">
                    @if (count($orders) > 0)
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td class="text-center align-middle">{{ $key + 1 }}</td>
                                <td class="text-center align-middle">
                                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                                        <a href="{{ route('restaurant_panels_charge_sale_note', $order->id) }}"
                                            type="button" class="btn btn-dark waves-effect waves-themed">Nota
                                            de Venta</a>
                                        @if ($btnVouchers)
                                            <button type="button" class="btn btn-info waves-effect waves-themed">Boleta
                                                Electrónica</button>
                                            <button type="button"
                                                class="btn btn-primary waves-effect waves-themed">Factura
                                                Electrónica</button>
                                        @endif
                                    </div>
                                </td>
                                <td class="align-middle">P{{ $order->id }}</td>
                                <td class="align-middle">{{ $order->customer_person_name }}</td>
                                <td class="align-middle">{{ $order->full_name }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}
                                </td>
                                <td class="align-middle">{{ $order->total }}</td>
                                <td class="align-middle">
                                    @if ($order->order_type == 'L')
                                        <span class="badge badge-warning">{{ __('restaurant::labels.local') }}</span>
                                    @else
                                        <span
                                            class="badge badge-danger">{{ __('restaurant::labels.to_carry_out') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="dataTables_empty text-center" valign="top">
                                {{ __('labels.no_records_to_display') }}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript"></script>
</div>
