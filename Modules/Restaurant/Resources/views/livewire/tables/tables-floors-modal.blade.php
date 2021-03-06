<div>
    <!-- Modal -->
    <div class="modal fade" id="modalFloorsForm" tabindex="-1" aria-labelledby="modalFloorsFormLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFloorsFormLabel">{{ __('restaurant::labels.floor') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label class="form-label" for="establishment">@lang('labels.establishment') <span
                                class="text-danger">*</span> </label>
                        <select wire:model.defer="establishment_id" class="custom-select" id="establishment">
                            <option value="">{{ __('labels.to_select') }}</option>
                            @foreach ($establishments as $establishment)
                                <option value="{{ $establishment->id }}">{{ $establishment->name }}</option>
                            @endforeach
                        </select>
                        @error('establishment_id')
                            <div class="invalid-feedback-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="name_floor">{{ __('labels.name') }}</label>
                        <input wire:model.defer="name_floor" type="text" class="form-control" id="name_floor">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('labels.close') }}</button>
                    <button wire:click="saveFloor" wire:target="saveFloor" wire:loading.attr="disabled" type="button"
                        class="btn btn-primary">{{ __('labels.save') }}</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('open-modal-floor-form', event => {
            $('#modalFloorsForm').modal('show');
        });

        window.addEventListener('close-modal-floor-form', event => {
            $('#modalFloorsForm').modal('hide');
        });
    </script>
</div>
