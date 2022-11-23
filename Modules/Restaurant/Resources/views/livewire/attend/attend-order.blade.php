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
                            class="btn btn-lg btn-success waves-effect waves-themed">{{ __('labels.all') }}</button>
                        @foreach ($categories as $category)
                            <button type="button" wire:click="$set('category_id',{{ $category->id }})"
                                class="btn btn-lg btn-primary waves-effect waves-themed">{{ $category->description }}</button>
                        @endforeach
                    </div>
                    <div style="max-height:400px;overflow-x: auto;">
                        <table class="table table-hover m-0">
                            @foreach ($commands as $command)
                                <tr wire:click="addCommands({{ $command->id }},'{{ $command->description }}','{{ $command->price }}')"
                                    style="cursor: pointer">
                                    <td>
                                        @if ($command->image)
                                            <img src="{{ asset($command->image) }}" alt="comanda" width="80px"
                                                class="img-thumbnail img-responsive rounded-circle"
                                                style="width:5rem; height: 5rem;">
                                        @else
                                            <img src="{{ url('logo/imagen-no-disponible.jpg') }}" alt="comanda"
                                                class="img-thumbnail img-responsive rounded-circle"
                                                style="width:5rem; height: 5rem;">
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <div class="ml-2 mr-3">
                                                <h5 class="m-0">
                                                    {{ $command->description }}
                                                    <small class="m-0 fw-300">
                                                        PRECIO: <b>{{ $command->price }}</b>
                                                    </small>
                                                </h5>
                                                <small class="text-info fs-sm">CÓDIGO:
                                                    {{ $command->internal_id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
                        @if (count($items) > 0)
                            @foreach ($items as $item)
                                <a wire:click="addProducts({{ $item->id }},'{{ $item->name }}','{{ $item->price }}')"
                                    href="javascript:void(0)" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $item->name }}
                                            <small class="m-0 fw-300">
                                                PRECIO: <b>{{ $item->price }}</b>
                                            </small>
                                        </h5>
                                        <small class="text-muted">{{ $item->stock }}</small>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @if ($table)
                <button type="button" class="btn btn-primary btn-block btn-lg mt-3" data-toggle="modal"
                    data-target="#modalOrderDetails">
                    Pedido Mesa: {{ $table['name'] }} / Items: {{ count($order_items) }}
                </button>
            @else
                <button onclick="returnTables()" type="button" class="btn btn-info btn-block btn-lg mt-3">
                    Elejir mesa
                </button>
            @endif

        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalOrderDetails" tabindex="-1"
        aria-labelledby="modalOrderDetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalOrderDetailsLabel">
                        @if ($table)
                            Pedido Mesa: {{ $table['name'] }}
                        @else
                            Elejir mesa
                        @endif
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
                        <div wire:ignore class="col-12 col-sm-8 col-md-8 col-lg-6">
                            <label>Mesas</label>
                            <select id="table_ids" name="table_ids[]" multiple="multiple">
                                @foreach ($xtables as $xtable)
                                    <option value="{{ $xtable->id }}">{{ $xtable->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <table class="table">
                            @php
                                $c = 1;
                            @endphp
                            @if (count($order_items) > 0)
                                @foreach ($order_items as $i => $order_item)
                                    <tr class="{{ $c % 2 == 0 ? 'table-primary' : 'table-warning' }}">
                                        <td class="align-middle text-center">
                                            <button wire:click="removeItems({{ $i }})"
                                                class="btn btn-danger btn-icon waves-effect waves-themed">
                                                <i class="fal fa-times"></i>
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <h5 class="mb-1">{{ $order_item['name'] }}</h5>
                                            <small>{{ \Carbon\Carbon::parse($order_item['requested_time'])->diffForHumans() }}</small>
                                        </td>
                                        <td class="align-middle">
                                            <textarea wire:model="order_items.{{ $i }}.details" rows="1" class="form-control"
                                                placeholder="{{ __('labels.detail') }}"></textarea>
                                        </td>
                                        <td class="align-middle text-right">
                                            {{ $order_item['price'] }}
                                        </td>
                                        <td class="align-middle " width="80px">
                                            <input wire:model="order_items.{{ $i }}.quantity" type="text"
                                                class="form-control text-right"
                                                placeholder="{{ __('labels.quantity') }}">
                                            @error('order_items.' . $i . '.quantity')
                                                <div class="invalid-feedback-2">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="align-middle text-right">
                                            {{ $order_item['subtotal'] }}
                                        </td>
                                    </tr>
                                    @php
                                        $c++;
                                    @endphp
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">
                                        <div class="p-3">
                                            <div class="alert alert-info text-center m-0">Sin Items</div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th class="text-right" colspan="5">
                                    TOTAL
                                </th>
                                <th class="text-right">
                                    {{ number_format($total, 2, '.', '') }}
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('labels.close') }}</button>
                    <button wire:click="removeAllItems" type="button"
                        class="btn btn-danger">{{ __('labels.cancel') }} Pedido</button>
                    <button onclick="saveRestOrder()" wire:target="saveOrder" type="button" class="btn btn-primary">
                        <i class="fal fa-location-arrow mr-1"></i>Pedir
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('rest-order-save', event => {
            initApp.playSound('{{ url('themes/smart-admin/media/sound') }}', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='{{ env('BOOTBOX_SUCCESS_ICON') }} text-warning mr-2'></i> <span class='text-warning fw-500'>Éxito!</span>",
                message: "<span><strong>Excelente... </strong>" + event.detail.msg + "</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false,
                callback: function() {
                    @this.emit('getTablesRefresh');
                    $('#table_ids').val(null).trigger('change');
                    $('a[href="#tab_default-1"]').click();
                    $('#modalOrderDetails').modal('hide');
                }
            });

            box.find('.modal-content').css({
                'background-color': "{{ env('BOOTBOX_SUCCESS_COLOR') }}"
            });
        });
        window.addEventListener('restaurant-active-orders', event => {
            $('a[href="#tab_default-2"]').click();
        });
        window.addEventListener('restaurant-active-tables', event => {
            $('a[href="#tab_default-1"]').click();
        })
        document.addEventListener('rest-select2', event => {
            $('#table_ids').select2();
        });
        document.addEventListener('livewire:load', function() {
            $('#table_ids').select2();
        });

        function saveRestOrder() {
            let table_ids = $('#table_ids').val();
            @this.set('table_ids', table_ids);
            @this.saveOrder();
        }

        function returnTables() {
            $('a[href="#tab_default-1"]').click();
        }

        window.addEventListener('restaurant-add-items-tray', event => {
            Command: toastr["success"]("Agregado correctamente")

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 100,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>

</div>
