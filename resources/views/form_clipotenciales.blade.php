@extends('layouts.app')

@section('content')

    <section class="wrapper">
        <!-- page start-->

        <div class="main-content">
            <div class="col-lg-12">

                <div class="panel panel-primary">
                    <header class="panel-heading">
                        Contacto de Seguimiento
                    </header>

                    <div class="panel-body">
                        <a href="{{ url('/prospectos_potenciales') }}">
                            <button class="btn btn-primary">Listado de Prospectos Potenciales</button>
                        </a>
                        <?php
                        $sistemas2 = [];
                        $sistemasevaluado = \CRMComercial\Entities\Sistema::where('sist_eliminado', '=', 0)->get();
                        foreach ($sistemasevaluado as $sist) {
                            $sistemas2[$sist->sist_codigo] = $sist->sist_nombre;
                        }
                        ?>

                        <div class="square-widget">
                            <div class="widget-container">
                                <div class="stepy-tab">
                                </div>

                                {!! Form::open(array('route' => ['form_clipotenciales.store', 'method' => 'POST'],  'name' => 'form', 'id' => 'default', 'enctype' =>'multipart/form-data')) !!}
                                {!! Form::hidden('editProsp', 3) !!}
                                {!! Form::hidden('concePotencial', 0) !!}

                                {!! Form::datetime('fechacarga', \Carbon\Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString(),["style" =>"display: none"]) !!}

                                {!! Form::text('url', URL::to('/'),["style" =>"display: none"]) !!}

                                <fieldset title="Información Clientes Potenciales">
                                    <legend>Información Clientes Potenciales</legend>

                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_codigo', 'Código Prospecto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('cpp_codigo', $sigProsp , ['class' => 'form-control','placeholder' => 'Código Prospecto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('con_nombre', 'Razon Social:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('con_nombre', null, ['class' => 'form-control','placeholder' => 'Razon Social']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_conces', 'Código Empresa:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('cpp_conces', $sigCod, ['class' => 'form-control','placeholder' => 'Código Empresa']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_categoria', 'Categoría:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_categoria',$categorias, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_pais', 'Pais:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_pais',$pais, null, ['class' => 'form-control', 'id' => 'select-pais']) !!}

                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_provincia', 'Provincia:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_provincia',$provincia, null, ['class' => 'form-control', 'id' => 'select-provincia']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('localidad', null, ['class' => 'form-control','placeholder' => 'Localidad', 'id' => 'localidad']) !!}
                                                    {!! Form::hidden('cpp_codpos1', null, ['id' => 'cpp_codpos1']) !!}
                                                    {!! Form::hidden('cpp_codpos2', null, ['id' => 'cpp_codpos2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_tipomarca', 'Tipo:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_tipomarca', $tipoMarca, null, ['class' => 'form-control', 'id'  => 'select-tipo']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_actividad', 'Actividad:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_actividad', $actividad, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_marca', 'Marca:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_marca',$marca, null, ['class' => 'form-control', 'id' => 'select-marca']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <!--/span-->
                                    </div>

                                    <!--/row-->
                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_tiporig', 'Tipo Origen:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_tiporig', $tipoorigenpotenciales,null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_nombreorig', 'Nombre Origen:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('cpp_nombreorig', null, ['class' => 'form-control','placeholder' => 'Nombre Origen']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_conformidad', 'Conformidad:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_conformidad', [0 => 'No', 1 => 'Si'], null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_estado', 'Estado:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_estado', $estadoProspecto,null, ['class' => 'form-control','onChange' => 'comprobar()']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_probcierre', 'Probabilidad Cierre:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_probcierre', $probCierre, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_vendedor', $vendedores, Auth::user()->ven_codigo, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_sistemact', 'Sistema Actual:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_sistemact', $sistema,null, ['class' => 'form-control', 'id' => 'sisact']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_sistemant', 'Sistema Anterior:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_sistemant', $sistema, null, ['class' => 'form-control', 'id' => 'sisant']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_sistemeva[]', 'Sistema Evaluados:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_sistemeva[]', $sistemas2, null, ['class' => 'form-control', 'data-placeholder' => 'Elija un sistema', 'multiple' => 'multiple', 'id' => 'chosen-select']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_fechademo', 'Fecha Demo:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('cpc_fechademo', null, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_fechaimplemen', 'Año Implementación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::select('cpc_fechaimplemen', array('1990' => '-', '2015' => '2015', '2016' => '2016', '2017' => '2017'),null, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_conocsiac', 'Conocimiento Siac:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_conocsiac', [0 => 'No', 1 => 'Si'], null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_valorsist', 'Valor Sistema:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_valorsist', null, ['class' => 'form-control', 'onChange' => 'fncSumar()','maxlength' => '30']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_financia', 'Financiación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_financia', $financiacion, null, ['class' => 'form-control', 'min' => '1']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_cantlicen', 'Cantidad Licencias:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_cantlicen', 0 , ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_valorimpl', 'Valor Implementación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_valorimpl', null, ['class' => 'form-control' ,'onChange' => 'fncSumar()' ,'maxlength' => '30']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_diasimple', 'Días Implementación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_diasimple', 0, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_preciomanteni', 'Precio Mantenimiento:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_preciomanteni', 0, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_valortotal', 'Total:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_valortotal', 0, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_feccierre', 'Fecha Cierre:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('cpc_feccierre', null, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_motcierreneg', 'Motivo Cierre Negativo', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_motcierreneg', $motCierreNeg, null, ['class' => 'form-control', 'id' => 'coc_MotCierreNeg']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_fechareact', 'Fecha Re Activación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('cpc_fechareact', null, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpp_fechafac', 'Fecha Facturación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('cpp_fechafac', null, ['class' =>'form-control','id' => 'fechafac']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_numfac', 'Número de Factura:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('cpp_numfac', null, ['class' => 'form-control','placeholder' => 'X-NN-NNNNNNNN']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_confprovactual', 'Conf. Prov. Actual:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::select('cpc_confprovactual', $confProvActual, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset title="Datos de Contacto">
                                    <legend>Datos de Contacto</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_fecha', 'Fecha Realización:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {{--{!! Form::date('cpc_fecha', \Carbon\Carbon::now()->toDateString(), ['class' =>'form-control', 'min' => \Carbon\Carbon::yesterday()->toDateString(), 'max' => \Carbon\Carbon::now()->toDateString()]) !!}--}}
                                                    {!! Form::date('cpc_fecha', \Carbon\Carbon::now()->toDateString(), ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_fechaplanifica', 'Fecha Planificación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('cpc_fechaplanifica', null, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_vendedor', $vendedores, Auth::user()->ven_codigo, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_modocontac', 'Modo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_modocontac', $modoContac,1, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_usuario', 'Nombre Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('cpc_usuario', '', ['class' => 'form-control','placeholder' => 'Usuario']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_modalidadcontac', 'Modalidad de Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_modalidadcontac', $modContacto, 1, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_tipocont', 'Tipo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_tipocont', $tipoContac,null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_adjunto', 'Adjuntar:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="controls col-md-7">
                                                    {!! Form::file('cpc_adjunto', ['class' => 'filestyle','data-buttonName' => 'btn btn-primary', 'data-buttonText' => 'Buscar']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('cpc_motivo', 'Motivo:', ['class' => 'control-label col-md-1']) !!}
                                                <div class="col-md-11">
                                                    {!! Form::text('cpc_motivo', null, ['class' => 'form-control','placeholder' => 'Motivo Contacto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('cpc_detallecont', 'Detalle Contacto:', ['class' => 'control-label col-md-1']) !!}
                                                <div class="col-md-11">
                                                    {!! Form::textarea('cpc_detallecont', null, ['class' => 'form-control', 'rows' => 3,'placeholder' => 'Detalle Contacto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset title="Datos Próximos Contacto">
                                    <legend>Datos Próximos Contacto</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpcp_fechaprox', 'Fecha Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {{--{!! Form::date('cpcp_fechaprox', null, ['class' =>'form-control', 'min' => \Carbon\Carbon::now()->toDateString()]) !!}--}}
                                                    {!! Form::date('cpcp_fechaprox', null, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpcp_vendeprox', 'Vendedor Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpcp_vendeprox', $vendedores,1, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpcp_usuarioprox', 'Nombre Usuario Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('cpcp_usuarioprox', '', ['class' => 'form-control','placeholder' => 'Usuario Próximo Contacto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('cpcp_detalleprox', 'Detalle Próximo Contacto:', ['class' => 'control-label col-md-1']) !!}
                                                <div class="col-md-11">
                                                    {!! Form::textarea('cpcp_detalleprox', null, ['class' => 'form-control', 'rows' => 3,'placeholder' => 'Detalle Próximo Contacto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <button class="btn btn-wi finish" id="but_finish">Guardar</button>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/crm_clipot.js')}}"></script>
    <script src="{{asset('assets/js/jquery.stepy.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>

    <script>
        /*=====STEPY WIZARD====*/
        $(function () {
            $('#default').stepy({
                backLabel: 'Anterior',
                block: true,
                nextLabel: 'Siguiente',
                titleClick: true,
                titleTarget: '.stepy-tab',
                validate: true
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#chosen-select').chosen();
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#localidad").autocomplete({
                source: '{{URL::route('localidades')}}',
                minLength: 1,
                select: function (event, ui) {
                    $('#localidad').val(ui.item.value);
                    $('#cpp_codpos1').val(ui.item.id);
                    $('#cpp_codpos2').val(ui.item.loc_codigo2);

                    $(this).val(ui.item ? ui.item : " ");
                },

                change: function (event, ui) {
                    if (!ui.item) {
                        this.value = '';
                    }
                },

            });
        });

    </script>
@endsection