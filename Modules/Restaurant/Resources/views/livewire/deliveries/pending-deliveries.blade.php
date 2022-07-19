<div>
    @foreach ($orders as $order)
        <div class="card mb-g"">
            <div class="card-header">D{{ $order->id }}</div>
            <div class="card-body pb-0 px-4">@lang('restaurant::labels.customer'): {{ $order->customer_person_name }}</div>

            <div class="card-footer">footer</div>
        </div>
    @endforeach
</div>
