@extends('restaurant::layouts.master')
@section('styles')
    <link rel="stylesheet" media="screen, print"
        href="{{ url('themes/smart-admin/css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ url('themes/smart-admin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ url('themes/smart-admin/css/formplugins/select2/select2.bundle.css') }}">
@endsection
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">
        <a href="{{ route('restaurant_dashboard') }}">
            {{ __('restaurant::labels.module_name') }}
        </a>
    </li>
    <li class="breadcrumb-item">
        {{ __('restaurant::labels.orders_receivable') }}
    </li>
    <li class="breadcrumb-item">
        {{ __('restaurant::labels.charge') }}
    </li>
    <li class="breadcrumb-item active">Boleta Electrónica</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block">
        <x-js-get-date></x-js-get-date>
    </li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-file-check'></i>Boleta Electrónica<sup
            class='badge badge-primary fw-500'>{{ __('labels.new') }}</sup>
        <small>@lang('labels.available_user')</small>
    </h1>
    <div class="subheader-block">
        @lang('labels.new')
    </div>
@endsection
@section('content')
    <livewire:restaurant::charge.charge-ticket :order_id="$id" />
@endsection
@section('script')
    <script src="{{ url('themes/smart-admin/js/formplugins/inputmask/inputmask.bundle.js') }}"></script>
    <script src="{{ url('themes/smart-admin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script
        src="{{ url('themes/smart-admin/js/formplugins/bootstrap-datepicker/locales/bootstrap-datepicker.' . Lang::locale() . '.min.js') }}">
    </script>
    <script src="{{ url('themes/smart-admin/js/formplugins/autocomplete-bootstrap/bootstrap-autocomplete.min.js') }}"
        defer></script>
    <script src="{{ url('themes/smart-admin/js/formplugins/select2/select2.bundle.js') }}" defer></script>
@endsection
