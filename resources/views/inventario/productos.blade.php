@extends('app')

@section('contenido')
    <div class="block-header">
        <h1>PRODUCTOS</h1>
    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><small>Disponibles para compra y venta</small></h2>
                    <a href="{{ url('productos/nuevo') }}" class="btn bg-cyan waves-effect m-r--5 pull-right"><i class="fa fa-plus"></i> Agregar nuevo producto</a>
                    <div class="clearfix"></div>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>USERNAME</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Larry</td>
                            <td>Jellybean</td>
                            <td>@lajelly</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Larry</td>
                            <td>Kikat</td>
                            <td>@lakitkat</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop