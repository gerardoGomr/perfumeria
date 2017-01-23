@extends('app')

@section('contenido')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Agregar nuevo producto a inventario
                    </h1>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Cancelar captura</a></li>
                                <li><a href="javascript:void(0);">Reiniciar captura</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body" id="divFormInventario">
                    <form action="{{ url('inventario/nuevo') }}" id="formInventario" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="producto">Producto:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="producto" id="producto" class="form-control selectpicker required" data-live-search="true" data-url="{{ url('inventario/productos/recargar') }}">
                                            <option value="">Seleccione</option>
                                            <option value="-1">Otro producto</option>
                                            @foreach($productos as $producto)
                                                <option value="{{ $producto->getId() }}">{{ $producto->getNombre() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="categoria">Categoría:</label>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="categoria" id="categoria" class="form-control selectpicker required" data-live-search="true">
                                            <option value="">Seleccione</option>
                                            <option value="-1">Otra categoría</option>
                                            @foreach($categorias as $categoria)
                                                <option value="{{ $categoria->getId() }}">{{ $categoria->getCategoria() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="presentacion">Presentación:</label>
                            </div>
                            <div class="col-lg-2 col-md-5 col-sm-6 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="presentacion" name="presentacion" class="numerosEnteros form-control" maxlength="4" placeholder="Ej. 100, 4, 3.4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-5 col-sm-6 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="unidadMedida" id="unidadMedida" class="required form-control selectpicker">
                                            <option value="">Seleccione</option>
                                            <option value="-1">Otra unidad de medida</option>
                                            @foreach($unidadesMedida as $unidadMedida)
                                                <option value="{{ $unidadMedida->getId() }}">{{ $unidadMedida->getUnidad() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <button class="btn btn-primary waves-effect" id="guardarProductoInventario" type="button"><i class="fa fa-save"></i> Agregar producto a inventario</button>
                            </div>
                        </div>
                    </form>
                </div>

                @include('inventario.productos_nuevo')
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/inventario/inventario_nuevo.js') }}"></script>
    <script src="{{ asset('js/inventario/productos_nuevo.js') }}"></script>
@stop