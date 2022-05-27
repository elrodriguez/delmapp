@extends('restaurant::layouts.master')
@section('styles')
    <link rel="stylesheet" media="screen, print"
        href="{{ url('themes/smart-admin/css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print"
        href="{{ url('themes/smart-admin/css/formplugins/select2/select2.bundle.css') }}">
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
        {{ __('restaurant::labels.tables') }}
    </li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block">
        <x-js-get-date></x-js-get-date>
    </li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-file-signature"></i>
        {{ __('restaurant::labels.tables') }}
        <sup class='badge badge-primary fw-500'>
            {{ __('labels.list') }}
        </sup>
    </h1>
    <div class="subheader-block">
        {{ __('labels.list') }}
    </div>
@endsection
@section('content')
    <div>
        <div id="panel-4" class="panel">
            <div class="panel-hdr border-faded border-top-0 border-right-0 border-left-0 shadow-0">
                <h2>
                    {{ __('restaurant::labels.waiter') }}
                    <span class="fw-300">
                        <i>{{ __('restaurant::labels.panel') }}</i>
                    </span>
                </h2>
                <div class="panel-toolbar pr-3 align-self-end">
                    <ul id="demo_panel-tabs" class="nav nav-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab_default-1" role="tab"
                                aria-selected="true">{{ __('restaurant::labels.tables') }}</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab_order_btn_rest" class="nav-link " data-toggle="tab"
                                href="{{ session()->has('rest_tab_id') ? session('rest_tab_id') : 'javascript:void(0)' }}"
                                role="tab" aria-selected="false">{{ __('restaurant::labels.order') }}</a>
                        </li>
                    </ul>
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen"
                        data-toggle="tooltip" data-offset="0,10"
                        data-original-title="{{ __('restaurant::labels.fullscreen') }}"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="tab-content p-3">
                        <div class="tab-pane fade active show" id="tab_default-1" role="tabpanel">
                            <livewire:restaurant::attend.attend-tables />
                        </div>
                        <div class="tab-pane fade" id="tab_default-2" role="tabpanel">
                            <livewire:restaurant::attend.attend-order />
                        </div>
                        <div class="tab-pane fade" id="tab_default-3" role="tabpanel">
                            <livewire:restaurant::attend.attend-re-order />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ url('themes/smart-admin/js/notifications/toastr/toastr.js') }}"></script>
    <script src="{{ url('themes/smart-admin/js/formplugins/select2/select2.bundle.js') }}"></script>
@stop
