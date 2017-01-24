<?php
use Perfumeria\Dominio\Productos\Genero;
?>
<div class="body" id="divFormProducto">
    <form action="{{ url('productos/nuevo') }}" id="formProducto" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label for="nombre">Nombre:</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" id="nombre" name="nombre" class="form-control required">
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
                        <select name="diseniador" id="diseniador" class="form-control selectpicker required" data-live-search="true">
                            <option value="">Seleccione</option>
                            @foreach($diseniadores as $diseniador)
                                <option value="{{ $diseniador->getId() }}">{{ $diseniador->getNombre() }}</option>
                            @endforeach
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
                        <input type="text" id="anioLanzamiento" name="anioLanzamiento" class="numerosEnteros form-control" maxlength="4">
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label for="enfocadoA">Enfocado a:</label>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select name="enfocadoA" id="enfocadoA" class="required form-control selectpicker">
                            <option value="">Seleccione</option>
                            <option value="{{ Genero::MUJERES }}">Mujeres</option>
                            <option value="{{ Genero::HOMBRES }}">Hombres</option>
                            <option value="{{ Genero::UNISEX }}">Unisex</option>
                            <option value="{{ Genero::NINOS }}">Niños</option>
                            <option value="{{ Genero::NINAS }}">Niñas</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label for="familiaOlfativa">Familia olfativa:</label>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select name="familiaOlfativa" id="familiaOlfativa" class="form-control selectpicker" data-live-search="true">
                            <option value="">Seleccione</option>
                            @foreach($familiasOlfativas as $familiaOlfativa)
                                <option value="{{ $familiaOlfativa->getId() }}">{{ $familiaOlfativa->getFamilia() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label for="acordes">Acordes principales (huele a...):</label>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                <div class="form-group">
                    <div class="input-group">
                        <select name="acordes" id="acordes" class="form-control selectpicker" data-live-search="true">
                            <option value="">Seleccione</option>
                            @foreach($acordes as $acorde)
                                <option value="{{ $acorde->getId() }}">{{ $acorde->getAcorde() }}</option>
                            @endforeach
                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn bg-blue-grey waves-effect" id="agregarAcorde" type="button"><i class="fa fa-plus"></i></button>
                                        </span>
                    </div>

                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                <h5 id="leyendaAcordes">No se han agregado acordes.</h5>
                <table class="table table-striped hide" id="tablaAcordes">
                    <thead>
                    <tr>
                        <th>Acorde</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyAcordes">

                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <br>

        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label for="notas">Notas:</label>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7">
                <div class="form-group">
                    <div class="input-group">
                        <select name="notas" id="notas" class="form-control selectpicker" data-live-search="true">
                            <option value="">Seleccione</option>
                            @foreach($notas as $nota)
                                <option value="{{ $nota->getId() }}">{{ $nota->getNombre() }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button class="btn bg-blue-grey" id="agregarNota" type="button"><i class="fa fa-plus"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                <h5 id="leyendaNotas">No se han agregado notas.</h5>
                <table class="table table-striped hide" id="tablaNotas">
                    <thead>
                    <tr>
                        <th>Nota</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyNotas">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                <button class="btn btn-primary waves-effect" id="guardarProducto" type="button"><i class="fa fa-save"></i> Guardar producto</button>
                <button class="btn btn-danger waves-effect" id="cancelarGuardarProducto" type="button"><i class="fa fa-times"></i> Cancelar y regresar</button>
                &nbsp;
                <span id="loading" class="hide"><i class="fa fa-spinner fa-spin fa-2x"></i></span>
            </div>
        </div>
    </form>
</div>