<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <div class="form-row needs-validation input-group {{ $errors->any()?'was-validated':'' }}" novalidate="">
                <div class="input-group bg-white shadow-inset-2">
                    <input wire:keydown.enter="searchPerson" wire:model="number_search" maxlength="11" type="text" class="form-control border-left-1 bg-transparent pl-1" id="number_search" required="" placeholder="{{__('transferservice::labels.lbl_enter_identity_document_number')}}">
                    @error('number_search')
                    <div class="invalid-feedback-2">{{ $message }}</div>
                    @enderror
                    <div class="input-group-append">
                        <button wire:click="searchPerson" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed">@lang('transferservice::buttons.btn_search')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        document.addEventListener('ser-customers-search_a', event => {
            initApp.playSound('{{ url("themes/smart-admin/media/sound") }}', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'>{{ __('transferservice::labels.lbl_success')}}!</span>",
                message: "<span>"+event.detail.msg+"</span>",
                centerVertical: true,
                swapButtonOrder: true,
                buttons:
                    {
                        confirm:
                            {
                                label: '{{__('transferservice::buttons.btn_yes')}}',
                                className: 'btn-danger shadow-0'
                            },
                        cancel:
                            {
                                label: '{{__('transferservice::buttons.btn_not')}}',
                                className: 'btn-default'
                            }
                    },
                className: "modal-alert",
                closeButton: false,
                callback: function(result) {
                    if(result){
                        let url = "{{ route('service_customers_create', ':id') }}";
                        url = url.replace(':id', 'A_'+event.detail.numberPerson);
                        window.location.href = url;
                    }
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });

        document.addEventListener('ser-customers-search_b', event => {
            initApp.playSound('{{ url("themes/smart-admin/media/sound") }}', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'>{{ __('transferservice::labels.lbl_success')}}!</span>",
                message: "<span>"+event.detail.msg+"</span>",
                centerVertical: true,
                swapButtonOrder: true,
                buttons:
                    {
                        confirm:
                            {
                                label: '{{__('transferservice::buttons.btn_yes')}}',
                                className: 'btn-danger shadow-0'
                            },
                        cancel:
                            {
                                label: '{{__('transferservice::buttons.btn_not')}}',
                                className: 'btn-default'
                            }
                    },
                className: "modal-alert",
                closeButton: false,
                callback: function(result) {
                    if(result) {
                        let url = "{{ route('service_customers_create', ':id') }}";
                        url = url.replace(':id', 'B_' + event.detail.personId);
                        window.location.href = url;
                    }
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });

        document.addEventListener('ser-customers-search_c', event => {
            initApp.playSound('{{ url("themes/smart-admin/media/sound") }}', 'bigbox')
            let box = bootbox.confirm({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'>{{ __('transferservice::labels.lbl_success')}}!</span>",
                message: "<span>"+event.detail.msg+"</span>",
                centerVertical: true,
                swapButtonOrder: true,
                buttons:
                    {
                        confirm:
                            {
                                label: '{{__('transferservice::buttons.btn_yes')}}',
                                className: 'btn-danger shadow-0'
                            },
                        cancel:
                            {
                                label: '{{__('transferservice::buttons.btn_not')}}',
                                className: 'btn-default'
                            }
                    },
                className: "modal-alert",
                closeButton: false,
                callback: function(result) {
                    if(result) {
                        let url = "{{ route('service_customers_edit', ':id') }}";
                        url = url.replace(':id', event.detail.customerId);
                        window.location.href = url;
                    }
                }
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });
    </script>
</div>
