@extends('inventory::layouts.master')
@section('breadcrumb')
    <x-company-name></x-company-name>
    <li class="breadcrumb-item">Configuraciones</li>
    <li class="breadcrumb-item"><a href="{{ route('inventory_category') }}">Categorias</a></li>
    <li class="breadcrumb-item active">Editar</li>
    <li class="position-absolute pos-top pos-right d-none d-sm-block"><x-js-get-date></x-js-get-date></li>
@endsection
@section('subheader')
    <h1 class="subheader-title">
        <i class="subheader-icon ni ni-book-open"></i>Editar <span class='fw-300'>Categoria</span> <sup class='badge badge-primary fw-500'>Edit</sup>
        
    </h1>
    <div class="subheader-block">
        Editar
    </div>
@endsection
@section('content')
@livewire('inventory::category.category-edit',['category_id' => $id])
@endsection
@section('script')
<script src="{{ url('themes/smart-admin/js/formplugins/inputmask/inputmask.bundle.js') }}"></script>
@endsection
