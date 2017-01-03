@extends('app')

@section('contenido')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Agregar nuevo producto
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
                <div class="body">
                    <form action="" id="formProducto" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nombre">Nombre:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="nombre" name="nombre" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="diseniador">Diseñador:</label>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="diseniador" id="diseniador" class="form-control show-tick" data-live-search="true">
                                            <option value="">Seleccione</option>
                                            <option value="1">CK</option>
                                            <option value="2">Dunhill</option>
                                            <option value="3">Paco Rabanne</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="anioLanzamiento">Año de lanzamiento:</label>
                            </div>
                            <div class="col-lg-2 col-md-5 col-sm-6 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="anioLanzamiento" name="anioLanzamiento" class="form-control" maxlength="4">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="diseniador">Enfocado a:</label>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="diseniador" id="diseniador" class="form-control show-tick">
                                            <option value="">Seleccione</option>
                                            <option value="M">Mujeres</option>
                                            <option value="H">Hombres</option>
                                            <option value="U">Unisex</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="tipoProducto">Tipo de producto:</label>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select name="tipoProducto" id="tipoProducto" class="form-control show-tick">
                                            <option value="">Seleccione</option>
                                            <option value="1">Perfume</option>
                                            <option value="2">Otro</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="capturaPerfume" class="hide">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="familiaOlfativa">Familia olfativa:</label>
                                </div>
                                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="familiaOlfativa" id="familiaOlfativa" class="form-control show-tick">
                                                <option value="">Seleccione</option>
                                                <option value="1">Aromática</option>
                                                <option value="2">Aromática acuática</option>
                                                <option value="3">Aromática fougêre</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="acordes">Acordes principales (huele a...):</label>
                                </div>
                                <div class="col-md-10 col-sm-8 col-xs-7">
                                    <select name="acordes[]" id="acordes" class="ms" multiple>
                                        <option value="">Seleccione</option>
                                        <option value="1">Amaderado</option>
                                        <option value="2">Balsámico</option>
                                        <option value="3">Dulce</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="acordes">Notas:</label>
                                </div>
                                <div class="col-md-10 col-sm-8 col-xs-7">
                                    <select name="notas[]" id="notas" class="ms" multiple>
                                        <option value="">Seleccione</option>
                                        <option value="1">Vainilla</option>
                                        <option value="2">Bergamota</option>
                                        <option value="3">Almizcle</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <button class="btn btn-primary waves-effect" type="button"><i class="fa fa-save"></i> Guardar producto</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('js/productos/productos_nuevo.js') }}"></script>
@stop