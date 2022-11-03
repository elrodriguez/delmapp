<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation {{ $errors->any() ? 'was-validated' : '' }}" novalidate="">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="category_id_new">@lang('restaurant::labels.categories')
                        </label>
                        <div wire:ignore>
                            <input type="text" id="justAnotherInputBox" placeholder="Escriba para filtrar"
                                autocomplete="off" />
                        </div>
                        @error('category_id_new')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="price">@lang('labels.code') <span
                                class="text-danger">*</span> </label>
                        <input wire:model.defer="internal_id" type="text" class="form-control" id="code" required="" readonly>
                        @error('internal_id')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="description">@lang('labels.description') <span
                                class="text-danger">*</span> </label>
                        <input wire:model="description" type="text" class="form-control" id="description" required="" readonly>
                        @error('description')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="price">@lang('labels.price') <span
                                class="text-danger">*</span> </label>
                        <input wire:model="price" type="text" class="form-control" id="price" required="" readonly>
                        @error('price')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="price">@lang('labels.amount_available') <span
                                class="text-danger">*</span> </label>
                        <input wire:model="amount_available" type="text" class="form-control" id="stock" required="" readonly>
                        @error('stock')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row" style="float: right;">
                    <div class="col-md-2 mb-3">
                        <label class="form-label" for="price">@lang('labels.amount_to_enter') <span
                                class="text-danger">*</span> </label>
                        <input wire:model="amount_to_enter" type="text" class="form-control" id="stock" required="" style="min-width: 6rem">
                        @error('stock')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="{{ route('restaurant_commands_list') }}" type="button"
                class="btn btn-secondary waves-effect waves-themed">{{ __('labels.list') }}</a>
            <button onclick="saveRestCommand()" wire:target="saveCommand" wire:loading.attr="disabled" type="button"
                class="btn btn-info ml-auto waves-effect waves-themed">{{ __('labels.btn_add_stock') }}</button>
        </div>
    </div>
    {{-- <script type="text/javascript">
        var comboTree2 = null;
        document.addEventListener('set-command-save', event => {
            initApp.playSound('{{ url('themes/smart-admin/media/sound') }}', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='{{ env('BOOTBOX_SUCCESS_ICON') }} text-warning mr-2'></i> <span class='text-warning fw-500'>Éxito!</span>",
                message: "<span><strong>Excelente... </strong>" + event.detail.msg + "</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false
            });

            box.find('.modal-content').css({
                'background-color': "{{ env('BOOTBOX_SUCCESS_COLOR') }}"
            });

        });

        document.addEventListener('livewire:load', function() {

            let SampleJSONData = @js($categories);
            let CategoryIds = @js($category_id_old);

            comboTree2 = $('#justAnotherInputBox').comboTree({
                source: SampleJSONData,
                isMultiple: true,
                cascadeSelect: true,
                collapse: false,
                selected: CategoryIds
            });

        });

        function saveRestCommand() {
            let cat = comboTree2.getSelectedIds();
            @this.set('category_id_new', cat);
            @this.saveCommand();
        }
    </script> --}}
</div>
