<div>
    <div class="card mb-g rounded-top">
        <div class="card-body">
            <form class="needs-validation <?php echo e($errors->any()?'was-validated':''); ?>" novalidate="">
                <div class="form-row">
                    <div class="col-md-4 mb-3" wire:ignore>
                        <label class="form-label" for="customer_id"><?php echo app('translator')->get('lend::labels.lbl_customer'); ?> </label>
                        <input wire:model="customer_text" required="" id="customer_text" class="form-control basicAutoComplete" type="text" placeholder="Ingrese el cliente a buscar y luego seleccione." data-url="<?php echo e(route('lend_contract_search')); ?>" autocomplete="off" />
                        <input wire:model="customer_id" type="hidden" required="" class="form-control" id="customer_id" required="">
                        <?php $__errorArgs = ['customer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-3" wire:ignore>
                        <label class="form-label" for="referred_id"><?php echo app('translator')->get('lend::labels.lbl_referred'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="referred_text" id="referred_text" class="form-control basicAutoCompleteReferred" type="text" placeholder="Ingrese el cliente a buscar y luego seleccione." data-url="<?php echo e(route('lend_contract_search')); ?>" autocomplete="off" />
                        <input wire:model="referred_id" type="hidden" class="form-control" id="referred_id" required="">
                        <?php $__errorArgs = ['referred_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="interest_id"><?php echo app('translator')->get('lend::labels.lbl_interest'); ?> <span class="text-danger">*</span> </label>
                        <select wire:model="interest_id" id="interest_id" class="custom-select" required="">
                            <option value=""><?php echo app('translator')->get('transferservice::labels.lbl_select'); ?></option>
                            <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" data-value="<?php echo e($item->value); ?>"><?php echo e($item->description); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['interest_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="payment_method_id"><?php echo app('translator')->get('lend::labels.lbl_payment_method'); ?> <span class="text-danger">*</span> </label>
                        <select wire:model="payment_method_id" id="payment_method_id" class="custom-select" required="">
                            <option value=""><?php echo app('translator')->get('transferservice::labels.lbl_select'); ?></option>
                            <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->description); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['payment_method_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="quota_id"><?php echo app('translator')->get('lend::labels.lbl_quotas'); ?> <span class="text-danger">*</span> </label>
                        <select wire:model="quota_id" id="quota_id" class="custom-select" required="">
                            <option value=""><?php echo app('translator')->get('transferservice::labels.lbl_select'); ?></option>
                            <?php $__currentLoopData = $quotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->amount); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['quota_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="date_start"><?php echo app('translator')->get('labels.date_start'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="date_start" type="text" class="form-control" id="date_start" required="" onchange="this.dispatchEvent(new InputEvent('input'))" data-inputmask="'mask': '99/99/9999'"  im-insert="true">
                        <?php $__errorArgs = ['date_start'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label" for="date_end"><?php echo app('translator')->get('labels.date_end'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="date_end" type="text" class="form-control" id="date_end" required="" disabled onchange="this.dispatchEvent(new InputEvent('input'))" data-inputmask="'mask': '99/99/9999'"  im-insert="true">
                        <?php $__errorArgs = ['date_end'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label" for="amount_capital"><?php echo app('translator')->get('lend::labels.lbl_principal_amount'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="amount_capital" type="text" class="form-control" id="amount_capital" required="">
                        <?php $__errorArgs = ['amount_capital'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label" for="amount_interest"><?php echo app('translator')->get('lend::labels.lbl_interest_amount'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="amount_interest" type="text" class="form-control" id="amount_interest" required="" disabled>
                        <?php $__errorArgs = ['amount_interest'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label" for="amount_total"><?php echo app('translator')->get('lend::labels.lbl_total_amount'); ?> <span class="text-danger">*</span> </label>
                        <input wire:model="amount_total" type="text" class="form-control" id="amount_total" required="" disabled>
                        <?php $__errorArgs = ['amount_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label class="form-label" for="additional_information"><?php echo app('translator')->get('lend::labels.lbl_additional_information'); ?> </label>
                        <input wire:model="additional_information" type="text" class="form-control" id="additional_information">
                        <?php $__errorArgs = ['additional_information'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label"><?php echo app('translator')->get('lend::labels.lbl_penalty'); ?> <span class="text-danger">*</span> </label>
                        <div class="custom-control custom-checkbox">
                            <input wire:model="penalty" type="checkbox" class="custom-control-input" id="penalty" checked="">
                            <label class="custom-control-label" for="penalty"><?php echo app('translator')->get('lend::labels.lbl_penalty_applies'); ?></label>
                        </div>
                        <?php $__errorArgs = ['penalty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-2" style="display: <?php echo e(($penalty?'block':'none')); ?>">
                        <label class="form-label" for="amount_penalty_day"><?php echo app('translator')->get('lend::labels.lbl_penalty_amount_day'); ?> <span class="text-danger"><?php echo e(($penalty?'*':'')); ?></span> </label>
                        <input wire:model="amount_penalty_day" type="text" class="form-control" id="amount_penalty_day" <?php echo e(($penalty?'required':'')); ?>>
                        <?php $__errorArgs = ['amount_penalty_day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer d-flex flex-row align-items-center">
            <a href="<?php echo e(route('lend_contract_index')); ?>" type="button" class="btn btn-secondary waves-effect waves-themed"><?php echo app('translator')->get('lend::labels.lbl_list'); ?></a>
            <button wire:click="save" wire:loading.attr="disabled" type="button" class="btn btn-info ml-auto waves-effect waves-themed"><?php echo app('translator')->get('lend::buttons.btn_save'); ?></button>
        </div>
    </div>
    <script type="text/javascript">
        function countHolidays(fec_ini, fec_end, op = 1){
            var inicio = new Date(fec_ini); //Fecha inicial
            var fin = new Date(fec_end); //Fecha final
            var timeDiff = Math.abs(fin.getTime() - inicio.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); //Días entre las dos fechas
            var cuentaFinde = 0; //Número de Sábados y Domingos
            var array = new Array(diffDays);

            for (var i=0; i < diffDays; i++)
            {
                //0 => Domingo - 6 => Sábado
                if(op == 1){
                    if (inicio.getDay() == 0) {
                        cuentaFinde++;
                    }
                }else{
                    if (inicio.getDay() == 0 || inicio.getDay() == 6) {
                        cuentaFinde++;
                    }
                }

                inicio.setDate(inicio.getDate() + 1);
            }

            return cuentaFinde;
        }

        function calcDateEnd(){
            let payment_method_value = $('#payment_method_id :selected').val();
            let quota_value = parseInt($('#quota_id :selected').html());
            let date_start_value = $('#date_start').val();
            let a = false;
            let b = false;
            let c = false;
            if(payment_method_value){
                a = true;
            }
            if(! isNaN(quota_value)){
                b = true;
            }
            if(date_start_value){
                date_start_value = date_start_value.split("/").reverse().join("-");
                isValidDate = Date.parse(date_start_value);
                if (isNaN(isValidDate)) {
                    c = false;
                }
                else{
                    c = true;
                }
            }
            let feriado = true;
            let amount_feriado = 0;
            if(a && b && c){
                let date_end_value = "";
                switch (payment_method_value) {
                    case '1': //Por Mes
                        let TuFecha_m = new Date(date_start_value+'T00:00:00');
                        //dias a sumar
                        let dias_m = parseInt(quota_value);
                        if (feriado){
                            while (dias_m > 0) {
                                TuFecha_m.setMonth(TuFecha_m.getMonth() + 1);
                                dias_m--;
                            }
                            if (TuFecha_m.getDay() == 0) {
                                TuFecha_m.setDate(TuFecha_m.getDate() + 1);
                            }
                        }else{
                            TuFecha_m.setMonth(TuFecha_m.getMonth() + dias_m);
                        }
                        //nueva fecha sumada
                        TuFecha_m = TuFecha_m.toISOString().slice(0, 10);
                        amount_feriado = countHolidays(date_start_value, TuFecha_m);
                        date_end_value = TuFecha_m.split("-").reverse().join("/");
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('date_end', date_end_value);
                        $('#date_end').val(date_end_value);
                        break;
                    case '2': //Por Semana
                        let TuFecha_s = new Date(date_start_value+'T00:00:00');
                        //dias a sumar
                        let dias_s = parseInt(quota_value);
                        if (feriado){
                            while (dias_s > 0) {
                                TuFecha_s.setDate(TuFecha_s.getDate() + 7);
                                dias_s--;
                            }
                            if (TuFecha_s.getDay() == 0) {
                                TuFecha_s.setDate(TuFecha_s.getDate() + 1);
                            }
                        }else{
                            TuFecha_s.setDate(TuFecha_s.getDate() + (dias_s * 7));
                        }
                        //nueva fecha sumada
                        TuFecha_s = TuFecha_s.toISOString().slice(0, 10);
                        amount_feriado = countHolidays(date_start_value, TuFecha_s);
                        date_end_value = TuFecha_s.split("-").reverse().join("/");
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('date_end', date_end_value);
                        $('#date_end').val(date_end_value);
                        break;
                    case '3': //Por Dia
                        let TuFecha = new Date(date_start_value+'T00:00:00');
                        //dias a sumar
                        let dias = parseInt(quota_value);
                        if (feriado){
                            while (dias > 0) {
                                TuFecha.setDate(TuFecha.getDate() + 1);
                                if (TuFecha.getDay() != 0) {
                                    dias--;
                                }
                            }
                            if (TuFecha.getDay() == 0) {
                                TuFecha.setDate(TuFecha.getDate() + 1);
                            }
                        }else{
                            TuFecha.setDate(TuFecha.getDate() + dias);
                        }
                        //nueva fecha sumada
                        TuFecha = TuFecha.toISOString().slice(0, 10);
                        amount_feriado = countHolidays(date_start_value, TuFecha);
                        date_end_value = TuFecha.split("-").reverse().join("/");
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('date_end', date_end_value);
                        $('#date_end').val(date_end_value);
                        break;
                }
            }else{
                window.livewire.find('<?php echo e($_instance->id); ?>').set('date_end', '');
                $('#date_end').val('');
            }
        }

        function calcAmountTotal(){
            let interest_value = $('#interest_id :selected').val();
            let interest_value_calc = parseFloat($('#interest_id :selected').attr('data-value'));
            let amount_capital_value = parseFloat($('#amount_capital').val());
            let a = false;
            let b = false;
            if(interest_value){
                a = true;
            }
            if(! isNaN(amount_capital_value)){
                b = true;
            }
            if(a && b){
                let total_amount_v = 0.00;
                let total_interest_v = 0.00;
                if(interest_value_calc > 1){
                    total_amount_v = parseFloat(interest_value_calc * amount_capital_value).toFixed(2);
                }else{
                    total_amount_v = parseFloat((1 + interest_value_calc) * amount_capital_value).toFixed(2);
                }
                total_interest_v = parseFloat(total_amount_v - amount_capital_value).toFixed(2);
                window.livewire.find('<?php echo e($_instance->id); ?>').set('amount_interest', total_interest_v);
                window.livewire.find('<?php echo e($_instance->id); ?>').set('amount_total', total_amount_v);
                $('#amount_interest').val(total_interest_v);
                $('#amount_total').val(total_amount_v);

            }else{
                window.livewire.find('<?php echo e($_instance->id); ?>').set('amount_interest', '');
                window.livewire.find('<?php echo e($_instance->id); ?>').set('amount_total', '');
                $('#amount_interest').val('');
                $('#amount_total').val('');
            }
        }

        document.addEventListener('len-contract-save', event => {
            initApp.playSound('<?php echo e(url("themes/smart-admin/media/sound")); ?>', 'voice_on')
            let box = bootbox.alert({
                title: "<i class='fal fa-check-circle text-warning mr-2'></i> <span class='text-warning fw-500'><?php echo e(__('lend::labels.lbl_success')); ?>!</span>",
                message: "<span><strong><?php echo e(__('lend::labels.lbl_excellent')); ?>... </strong>"+event.detail.msg+"</span>",
                centerVertical: true,
                className: "modal-alert",
                closeButton: false
            });
            box.find('.modal-content').css({'background-color': 'rgba(122, 85, 7, 0.5)'});
        });

        document.addEventListener('livewire:load', function () {
            $('.basicAutoComplete').autoComplete().on('autocomplete.select', function (evt, item) {
                window.livewire.find('<?php echo e($_instance->id); ?>').set('customer_id',item.value);
                window.livewire.find('<?php echo e($_instance->id); ?>').set('customer_text',item.text);
            });

            $('.basicAutoCompleteReferred').autoComplete().on('autocomplete.select', function (evt, item) {
                window.livewire.find('<?php echo e($_instance->id); ?>').set('referred_id',item.value);
                window.livewire.find('<?php echo e($_instance->id); ?>').set('referred_text',item.text);
            });

            $(":input").inputmask();
            var controls = {
                leftArrow: "<i class='fal fa-angle-left' style='font-size: 1.25rem'></i>",
                rightArrow: "<i class='fal fa-angle-right' style='font-size: 1.25rem'></i>"
            }

            $("#date_start").datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls,
                language: "es",
                autoclose: true
            }).on('hide', function(e){
                window.livewire.find('<?php echo e($_instance->id); ?>').set('date_start',this.value);
                calcDateEnd();
            });

            $("#date_end").datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: controls,
                language: "es",
                autoclose: true
            }).on('hide', function(e){
                window.livewire.find('<?php echo e($_instance->id); ?>').set('date_end', this.value);
            });

            $('#payment_method_id').change(function (){
                calcDateEnd();
            });

            $('#quota_id').change(function (){
                calcDateEnd();
            });

            $('#date_start').keyup(function (){
                calcDateEnd();
            });

            $('#date_start').keydown(function (){
                calcDateEnd();
            });
            //
            $('#interest_id').change(function (){
                calcAmountTotal();
            });

            $('#amount_capital').keyup(function (){
                calcAmountTotal();
            });
        });
    </script>
</div>
<?php /**PATH C:\laragon\www\delmapp\Modules/Lend\Resources/views/livewire/contract/contract-create.blade.php ENDPATH**/ ?>