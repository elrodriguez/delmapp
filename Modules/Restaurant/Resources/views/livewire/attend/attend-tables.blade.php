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
        @foreach ($tables as $table)
            @if ($table->occupied)
                <div onclick="openFormReOrder({{ $table->id }})" class="col-12 col-sm-4 col-md-3 col-lg-3 col-xl-3"
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
            @else
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
            @endif
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
    </script>
</div>
