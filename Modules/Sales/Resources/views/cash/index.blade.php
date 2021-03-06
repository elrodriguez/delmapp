@extends('sales::layouts.master')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="{{ url('themes/smart-admin/css/datagrid/datatables/datatables.bundle.css') }}">
@endsection
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">@lang('sales::labels.module_name')</li>
    <li class="breadcrumb-item">@lang('sales::labels.lbl_administration')</li>
    <li class="breadcrumb-item active">@lang('sales::labels.petty_cash')</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-cash-register'></i>{{ __('sales::labels.petty_cash') }}<sup class='badge badge-primary fw-500'>{{__('labels.list')}}</sup>
        <small>@lang('labels.available_user')</small>
    </h1>
    <div class="subheader-block">
        @lang('labels.list')
    </div>
@endsection
@section('content')
    @livewire('sales::cash.cash-list')
@endsection


