@extends('restaurant::layouts.master')
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">
        <a href="{{ route('restaurant_dashboard') }}">
            {{ __('restaurant::labels.module_name') }}
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('restaurant_floors_list') }}">{{ __('restaurant::labels.floor') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('labels.edit') }}
    </li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block">
        <x-js-get-date></x-js-get-date>
    </li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon fal fa-island-tropical"></i>
        {{ __('restaurant::labels.floor') }}
        <sup class='badge badge-primary fw-500'>
            {{ __('labels.edit') }}
        </sup>
    </h1>
    <div class="subheader-block">
        {{ __('labels.edit') }}
    </div>
@endsection
@section('content')
    <livewire:restaurant::floors.floors-edit :floor_id="$id" />
@stop
