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
    <li class="breadcrumb-item">
        {{ __('restaurant::labels.panels') }}
    </li>
    <li class="breadcrumb-item active">
        {{ __('restaurant::labels.deliveries') }}
    </li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block">
        <x-js-get-date></x-js-get-date>
    </li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-person-carry"></i>
        {{ __('restaurant::labels.deliveries') }}
        <sup class='badge badge-primary fw-500'>
            {{ __('labels.list') }}
        </sup>
    </h1>
    <div class="subheader-block">
        {{ __('labels.list') }}
    </div>
@endsection
@section('content')
<livewire:restaurant::attend.deliveries />
@endsection
@section('script')
    <script src="{{ url('themes/smart-admin/js/notifications/toastr/toastr.js') }}"></script>
@stop
