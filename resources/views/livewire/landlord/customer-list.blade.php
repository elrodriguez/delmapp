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

                                        <th>Employee</th>


                                        <th style="width: 100px;">Active</th>
                                        <th style="width: 51px;">Earnings</th>
                                        <th style="width: 24px;"></th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="search">

                                    <tr>

                                        <td>

                                            <span class="js-lists-values-employee-name">Kalum Atherton</span>

                                        </td>


                                        <td><small class="text-muted">3 days ago</small></td>
                                        <td>&dollar;12,402</td>
                                        <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                                    </tr>

                                    <tr>

                                        <td>

                                            <span class="js-lists-values-employee-name">Helen Mcdaniel</span>

                                        </td>


                                        <td><small class="text-muted">2 days ago</small></td>
                                        <td>&dollar;48,108</td>
                                        <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                                    </tr>

                                    <tr>

                                        <td>

                                            <span class="js-lists-values-employee-name">Karim Hicks</span>

                                        </td>


                                        <td><small class="text-muted">1 hour ago</small></td>
                                        <td>&dollar;11,802</td>
                                        <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                                    </tr>

                                    <tr>

                                        <td>

                                            <span class="js-lists-values-employee-name">Clifford Burgess</span>

                                        </td>


                                        <td><small class="text-muted">2 hours ago</small></td>
                                        <td>&dollar;84,401</td>
                                        <td><a href="" class="text-muted"><i class="material-icons">more_vert</i></a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
