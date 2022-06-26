<div>
    <div class="container page__container">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ route('landlord_dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Clientes</li>
        </ol>
    </div>
    <div class="container page__container page-section">
        <div class="card mb-32pt">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h4 class="card-title">Lista de Clientes</h4>
                        <a href="{{ route('landlord_customer_create') }}" class="btn btn-primary">Nuevo</a>
                    </div>
                    <div class="col-lg-8">

                        <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                            <div class="search-form search-form--light mb-3">
                                <input type="text" class="form-control search" placeholder="Search">
                                <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                            </div>

                            <table class="table table-flush">
                                <thead>
                                    <tr>
                                        <th>Dominio</th>
                                        <th>Empresa</th>
                                        <th>Representante</th>
                                        <th>Usuarios</th> 
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">
                                    @if(count($customers)>0)
                                        @foreach ($customers as $item)
                                            <tr>
                                                <td>{{ $item->domain }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->representative_name }}</td>
                                                <td class="text-center">
                                                    <button wire:click="getCustomerUsers('{{ $item->tenancy_db_name }}')" type="button" class="btn btn-secondary btn-sm">
                                                        <i class="fa fa-user"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <div class="alert alert-light border-1 border-left-4 border-left-accent" role="alert">
                                                    No existen clientes para mostrar
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                   <div class="col align-self-end">{{ $customers->links() }}</div> 
                </div>
            </div>
        </div>
    </div>
</div>
