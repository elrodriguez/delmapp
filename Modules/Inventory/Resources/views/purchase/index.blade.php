@extends('inventory::layouts.master')
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">@lang('inventory::labels.lbl_inventory')</li>
    <li class="breadcrumb-item">@lang('inventory::labels.lbl_shopping')</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="fal fa-shopping-cart"></i></i> @lang('inventory::labels.lbl_shopping')<sup class='badge badge-primary fw-500'>@lang('inventory::labels.lbl_list')</sup>
    </h1>
    <div class="subheader-block">
        @lang('inventory::labels.lbl_list')
    </div>
@endsection
@section('content')
@livewire('inventory::purchase.purchase-list')
@endsection
