<div>
    <div class="container page__container">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('landlord_dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('landlord_customer') }}">Clientes</a></li>
            <li class="breadcrumb-item active">Nuevo</li>
        </ol>
    </div>
    <div class="container page__container page-section">
        <div class="card card-body mb-32pt">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="card-title">Nuevo Clientes</h4>
                    <a href="{{ route('landlord_customer') }}" class="btn btn-primary">Atras</a>
                </div>
                <div class="col-lg-8">
                    <form>
                        <div class="{{ $errors->any() ? 'was-validated' : '' }}">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="company_name">Nombre Empresa</label>
                                    <input wire:model.defer="company_name" type="text" class="form-control" id="company_name" required="">
                                    @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="number_ruc">N. RUC</label>
                                    <input wire:model.defer="number_ruc" type="text" class="form-control" id="number_ruc" required="">
                                    @error('number_ruc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="email">Email <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="email" type="text" class="form-control" id="email" required="">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="tradename">@lang('setting::labels.tradename') <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="tradename" type="text" class="form-control" id="tradename" required="">
                                    @error('tradename')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="phone">Teléfono fijo <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="phone" type="text" class="form-control" id="phone" required="">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="phone_mobile">Teléfono móvil <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="phone_mobile" type="text" class="form-control" id="phone_mobile" required="">
                                    @error('phone_mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="representative_name">Nombre del representante <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="representative_name" type="text" class="form-control" id="representative_name" required="">
                                    @error('representative_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="representative_number">Número de identificación <span class="text-danger">*</span> </label>
                                    <input wire:model.defer="representative_number" type="text" class="form-control" id="representative_number" required="">
                                    @error('representative_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <h4>Datos del Sistema</h4>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="database_name">Nombre Base de Datos<span class="text-danger">*</span> </label>
                                    <input wire:model.defer="database_name" type="text" class="form-control" id="database_name" required="">
                                    @error('database_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="subdomain">Nombre Sub Dominio<span class="text-danger">*</span> </label>
                                    <input wire:model.defer="subdomain" type="text" class="form-control" id="subdomain" required="">
                                    @error('subdomain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button wire:loading.remove wire:loading.attr="disabled" wire:click="save" type="button" class="btn btn-primary">
                            {{ __('labels.save') }}
                        </button>
                        <button style="display:none" wire:target="save" wire:loading class="btn btn-primary" type="button" disabled="">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            {{ $this->loading_msg }}...
                        </button>
                        {{-- <button class="btn btn-primary" type="submit">Guardar</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
