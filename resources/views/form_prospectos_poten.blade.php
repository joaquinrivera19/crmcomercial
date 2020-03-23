@extends('layouts.app')

@section('content')

    <section class="wrapper">
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

                        <a class="btn btn-small btn-primary" data-toggle="modal"
                           data-target="#histreplanifica">Ver Historial de RePlanificación</a>

                        <script>var sistCodigo = [];</script>
                        <?php

                        $contactoss = \CRMComercial\Entities\ContactoCliPot::where('cpc_prospecto', '=', $contacto->cpc_prospecto)->orderBy('cpc_codigo', 'desc')->first();

                        foreach ($contactoss->sistemaEvaluados as $sist) {

                        $sistemas2[$sist->sist_codigo] = $sist->sist_codigo;
                        ?>
                        <script>
                            sistCodigo.push(JSON.parse("<?php echo json_encode($sist->sist_codigo); ?>"));
                            console.log(sistCodigo);
                        </script>
                        <?php
                        }

                        $sistemass = [];
                        foreach ($sistemas as $sist) {
                            $sistemass[$sist->sist_codigo] = $sist->sist_nombre;
                        }

                        ?>

                        <div class="square-widget">
                            <div class="widget-container">
                                <div class="stepy-tab">
                                </div>

                                {!! Form::model($contacto, array('route' => ['form_clipotenciales.update', $contacto->cpp_codigo], 'method' => 'PUT',  'name' => 'form', 'id' => 'default', 'enctype' =>'multipart/form-data')) !!}
                                {!! Form::hidden('editProsp', 1) !!}
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
                                                    {!! Form::text('cpp_codigo', $contacto->cpp_codigo , ['class' => 'form-control','placeholder' => 'Código Prospecto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('con_nombre', 'Razon Social:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('con_nombre', $contacto->cpp_nombre, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_conces', 'Código Empresa:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('cpp_conces', $contacto->cpp_conces, ['class' => 'form-control','placeholder' => 'Código Empresa']) !!}
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
                                                    {!! Form::text('localidad', $contacto->cpp_localinombre, ['class' => 'form-control','placeholder' => 'Localidad', 'id' => 'localidad']) !!}
                                                    {!! Form::hidden('cpp_codpos1', null, ['id' => 'cpp_codpos1']) !!}
                                                    {!! Form::hidden('cpp_codpos2', null, ['id' => 'cpp_codpos2']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_tipomarca', 'Tipo:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpp_tipomarca', $tipoMarca, null, ['class' => 'form-control', 'id'  => 'select-tipo']) !!}
                                                </div>
                                            </div>
                                        </div>
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
                                                <div class="col-md-7" id="div-marca">
                                                    @if($contacto->cpp_tipomarca == 1)
                                                        {!! Form::select('cpp_marca',$marca, null, ['class' => 'form-control', 'id' => 'select-marca']) !!}
                                                    @else
                                                        {!! Form::text('cpp_marcadetalle', null, ['class' => 'form-control', 'id' => 'input-marca']) !!}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                                    {!! Form::select('cpc_estado', $estadoProspecto, null, ['class' => 'form-control','onChange' => 'comprobar()']) !!}
                                                </div>
                                            </div>
                                        </div>
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
                                                    {!! Form::select('cpp_vendedor', $vendedores, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_sistemact', 'Sistema Actual:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_sistemact', $sistema, null, ['class' => 'form-control', 'id' => 'sisact']) !!}
                                                </div>
                                            </div>
                                        </div>
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
                                                    {!! Form::select('cpc_sistemeva[]', $sistemass, null, ['class' => 'form-control', 'data-placeholder' => 'Elija un sistema', 'multiple' => 'multiple', 'id' => 'chosen-select']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_fechademo', 'Fecha Demo:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('cpc_fechademo', $contacto->cpc_fechademo == '1900-01-01' ? $contacto->cpc_fechademo = 'dd/mm/aaaa' : $contacto->cpc_fechademo, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_fechaimplemen', 'Año Implementación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::select('cpc_fechaimplemen', array('1990' => '-', '2015' => '2015', '2016' => '2016', '2017' => '2017'),$contacto->cpc_fechaimplemen, ['class' => 'form-control']) !!}
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
                                                    {!! Form::number('cpc_valorsist', null, ['class' => 'form-control', 'onChange' => 'fncSumar()', 'id' => 'cpc_valorsist']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_financia', 'Financiación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_financia', $financiacion, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_cantlicen', 'Cantidad Licencias:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_cantlicen', null , ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_valorimpl', 'Valor Implementación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_valorimpl', null, ['class' => 'form-control', 'onChange' => 'fncSumar()']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_diasimple', 'Días Implementación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_diasimple',null, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_preciomanteni', 'Precio Mantenimiento:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_preciomanteni', null, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpc_valortotal', 'Total:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('cpc_valortotal', null, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_feccierre', 'Fecha Cierre:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('cpc_feccierre', $contacto->cpc_feccierre == '1900-01-01' ? $contacto->cpc_feccierre = 'dd/mm/aaaa' : $contacto->cpc_feccierre, ['class' =>'form-control']) !!}
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
                                                    {!! Form::date('cpc_fechareact', $contacto->cpc_fechareact == '1900-01-01' ? $contacto->cpc_fechareact = 'dd/mm/aaaa' : $contacto->cpc_fechareact, ['class' =>'form-control']) !!}
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
                                                    {!! Form::date('cpp_fechafac', $contacto->cpp_fechafac == '1900-01-01' ? $contacto->cpp_fechafac = 'dd/mm/aaaa' : $contacto->cpp_fechafac, ['class' =>'form-control','id' => 'fechafac']) !!}
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
                                    @include('partials.contactos_poten_realizados')
                                </fieldset>
                                <fieldset title="Datos de Contacto">
                                    <legend>Datos de Contacto</legend>
                                    {!! Form::hidden('cpc_codigo', null) !!}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_fecha', 'Fecha Realización:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {{--{!! Form::date('cpc_fecha', $contacto->cpc_fecha == '1900-01-01' ? $contacto->cpc_fecha = 'dd/mm/aaaa' : $contacto->cpc_fecha, ['class' =>'form-control','min' => \Carbon\Carbon::yesterday()->toDateString(), 'max' => \Carbon\Carbon::now()->toDateString()]) !!}--}}
                                                    {!! Form::date('cpc_fecha', $contacto->cpc_fecha == '1900-01-01' ? $contacto->cpc_fecha = 'dd/mm/aaaa' : $contacto->cpc_fecha, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('cpc_fechaplanifica', 'Fecha Planificación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('cpc_fechaplanifica', $contacto->cpc_fechaplanifica, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpc_vendedor', $vendedores, 1, ['class' => 'form-control']) !!}
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
                                                    {!! Form::text('cpc_usuario', null, ['class' => 'form-control','placeholder' => 'Usuario']) !!}
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
                                                    {!! Form::select('cpc_tipocont', $tipoContac,1, ['class' => 'form-control']) !!}
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-7">
                                                    <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#exampleModal"
                                                       data-whatever="{{$contacto->cpp_codigo}}">Ver Archivos Adjuntos</a>
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
                                                    {{--{!! Form::date('cpcp_fechaprox', $contacto->cpcp_fechaprox == '1900-01-01' ? $contacto->cpcp_fechaprox = 'dd/mm/aaaa' : $contacto->cpcp_fechaprox, ['class' =>'form-control', 'min' => \Carbon\Carbon::now()->toDateString()]) !!}--}}
                                                    {!! Form::date('cpcp_fechaprox', $contacto->cpcp_fechaprox == '1900-01-01' ? $contacto->cpcp_fechaprox = 'dd/mm/aaaa' : $contacto->cpcp_fechaprox, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpcp_vendeprox', 'Vendedor Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('cpcp_vendeprox', $vendedores, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpcp_usuarioprox', 'Nombre Usuario Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('cpcp_usuarioprox', $contacto->cpcp_usuarioprox, ['class' => 'form-control','placeholder' => 'Usuario Próximo Contacto']) !!}
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

    @include('partials.modal_adjuntos_poten')
    @include('partials.modal_histreplanifica')

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
            $('#chosen-select').val(sistCodigo).trigger('chosen:updated');
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