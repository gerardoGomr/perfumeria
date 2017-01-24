@extends('app')

@section('contenido')
    <div class="block-header">
        <h1>INVENTARIO ACTUAL</h1>
    </div>

    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><small>Actualizado al día {{ date('d/m/Y') }}</small></h2>
                    <a href="{{ url('inventario/nuevo') }}" class="btn bg-cyan waves-effect m-r--5 pull-right"><i class="fa fa-plus"></i>Agregar producto al inventario</a>
                    <div class="clearfix"></div>
                </div>
                <div class="body">
                    <?php $i = 0 ?>
                    <table class="table table-bordered table-striped table-hover dataTable" id="tablaProductos">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>PRODUCTO</th>
                            <th>PARA</th>
                            <th>CATEGORÍA</th>
                            <th>CÓDIGO</th>
                            <th>EXISTENCIAS</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>PRODUCTO</th>
                            <th>PARA</th>
                            <th>CATEGORÍA</th>
                            <th>CÓDIGO</th>
                            <th>EXISTENCIAS</th>
                            <th>&nbsp;</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $producto->descripcion() }}</td>
                                <td>{{ $producto->getProducto()->genero() }}</td>
                                <td>{{ $producto->getCategoria()->getCategoria() }}</td>
                                <td>{{ $producto->getCodigo() }}</td>
                                <td>{{ $producto->getCantidad() }}</td>
                                <td>
                                    <div class="btn-group btn-group-xs">
                                        <a href="" class="btn waves-effect bg-amber" title="Editar producto" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/inventario/inventario.js') }}"></script>
@stop