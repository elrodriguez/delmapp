@extends('restaurant::layouts.master')
@section('styles')
    <link rel="stylesheet" media="screen, print"
        href="{{ url('themes/smart-admin/css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ url('themes/smart-admin/css/notifications/toastr/toastr.css') }}">
@endsection
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">
        <a href="{{ route('restaurant_dashboard') }}">
            {{ __('restaurant::labels.module_name') }}
        </a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('restaurant::labels.list_orders') }}
    </li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block">
        <x-js-get-date></x-js-get-date>
    </li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-table"></i>
        {{ __('restaurant::labels.list_orders') }}
        <sup class='badge badge-primary fw-500'>
            {{ __('labels.attend') }}
        </sup>
    </h1>
    <div class="subheader-block">
        {{ __('labels.attend') }}
    </div>
@endsection
@section('content')
    <livewire:restaurant::orders.orders-list />
@endsection
@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ url('themes/smart-admin/js/notifications/toastr/toastr.js') }}"></script>
    <script>
        Echo.channel('resfresh-orders')
            .listen('Restaurant\\OrderCommand', () => {
                refreshalert();
            });

        function refreshalert() {
            Command: toastr["info"]("Se Agregó un pedido a la lista")
            initApp.playSound("{{ url('themes/smart-admin/media/sound') }}", 'smallbox')
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
        }
    </script>
@stop
