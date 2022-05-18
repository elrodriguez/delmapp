<div class="p-3 bg-success-500 rounded overflow-hidden position-relative text-white mb-g">
    <div class="">
        <h3 class="display-4 d-block l-h-n m-0 fw-500">
            {{ $quantity }}
            <small class="m-0 l-h-n">{{ ($quantity==1?Lang::get('lend::labels.lbl_customer'):Lang::get('lend::labels.lbl_customers')) }}</small>
        </h3>
    </div>
    <i class="fal fa-users-class position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
</div>
