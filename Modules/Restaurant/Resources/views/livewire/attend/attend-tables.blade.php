<div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label class="form-label" for="floor">
                @lang('restaurant::labels.floor')
                <span class="text-danger">*</span>
            </label>
            <select wire:model.defer="floor_id" class="custom-select">
                <option value="">{{ __('labels.to_select') }}</option>
                @foreach ($floors as $floor)
                    <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                @endforeach
            </select>
            @error('floor_id')
                <div class="invalid-feedback-2">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">

        @foreach ($desoccupied_tables as $table)
            <div onclick="openFormOrder({{ $table->id }})" class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3"
                style="cursor: pointer">
                <div class="p-3 bg-warning-500 rounded overflow-hidden position-relative text-white mb-g">
                    <div class="">
                        <h3 class="display-4 d-block l-h-n m-0 fw-500">
                            {{ $table->name }}
                            <small class="m-0 l-h-n">
                                Sillas : {{ $table->chairs }}
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
        @endforeach

        @foreach ($occupied_tables as $table)
            <div onclick="openFormReOrder({{ $table->id }})"
                @if($table->shared)
                class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6"
                @else
                class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3"
                @endif
                style="cursor: pointer">
                <div class="p-3 bg-danger-800  rounded overflow-hidden position-relative text-white mb-g">
                    <div class="">
                        <h3 class="display-4 d-block l-h-n m-0 fw-500">
                            {{ $table->name }}
                            <small class="m-0 l-h-n">
                                Sillas : {{ $table->chairs }}
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
        @endforeach

    </div>
    <script>
        function openFormOrder(id) {
            let b = document.getElementById('tab_order_btn_rest');
            b.setAttribute("href", "#tab_default-2");
            @this.emit('showFormOrder', id);
        }

        function openFormReOrder(id) {
            let b = document.getElementById('tab_order_btn_rest');
            b.setAttribute("href", "#tab_default-3");
            @this.emit('showFormReOrder', id);
        }
        document.addEventListener('restaurant-set-free-table', event => {

            initApp.playSound('{{ url('themes/smart-admin/media/sound') }}', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='{{ env('BOOTBOX_WARNING_ICON') }} text-danger mr-2'></i> ¿Desea liberar mesa?",
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
                        @this.updateStateTable(event.detail.orderId)
                    }
                }
            });
            box.find('.modal-content').css({
                'background-color': "{{ env('BOOTBOX_WARNING_COLOR') }}"
            });
        });
    </script>
</div>
