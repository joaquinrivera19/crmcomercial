@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Contacto de Seguimiento
                </header>
                <div class="panel-body">
                    <span class="pull-right" style="">
                        <div class="btn-group">
                            @if($contacto->estado->epr_nombre != "Cierre Positivo Implementado y Encuestado")
                                <a class='btn btn-success' role='button'
                                   href='{{URL::to('/form_clipotenciales/'.$contacto->cpp_codigo.'/edit')}}'><i
                                            class='fa fa-plus'></i> Cargar Contacto</a>
                            @endif
                        </div>

                        <div class="btn-group">
                            @if(Auth::user()->ven_menu == 1)
                                <a class='btn btn-success' role='button'
                                   href='{{URL::to('/form_clipotenciales/'.$contacto->cpp_codigo.'/editProspecto')}}'><i
                                            class='fa fa-edit'></i> Editar Prospecto</a>
                            @endif
                        </div>

                         <div class="btn-group">
                             <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#histreplanifica">Ver Historial de RePlanificación</a>
                         </div>
                    </span>
                    <?php

                    $sistemas2 = [];
                    foreach ($contacto->sistemaEvaluados as $sist) {
                        $sistemas2[$sist->sist_codigo] = $sist->sist_nombre;
                    }

                    ?>

                    {!! Form::model(array('route' => ['form_clipotenciales'], 'method' => 'PUT',  'name' => 'form')) !!}

                    <div class="titulo_show">Información Clientes Potenciales</div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_codigo', 'Código Prospecto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpp_codigo', $contacto->cpp_codigo , ['class' => 'form-control codprospecto','readOnly' => 'readOnly']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="cliente">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('con_nombre', 'Razon Social:', ['class' => 'control-label col-md-5']) !!}
                                    <div class="col-md-7">
                                        {!! Form::text('con_nombre', $contacto->cpp_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('cpp_conces', 'Código Empresa:', ['class' => 'control-label col-md-5']) !!}
                                    <div class="col-md-7">
                                        {!! Form::text('cpp_conces', $contacto->cpp_conces, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_categoria', 'Categoría:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpp_categoria',$contacto->cate_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_pais', 'Pais:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpp_pais', $contacto->pais_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_provincia', 'Provincia:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpp_provincia', $contacto->prov_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('localidad', $contacto->cpp_localinombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
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
                                    {!! Form::text('cpp_tipomarca', $contacto->tmar_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_actividad', 'Actividad:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpp_actividad', $contacto->act_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_marca', 'Marca:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7" id="div-marca">
                                    @if($contacto->cpp_tipomarca == 1)
                                        {!! Form::text('cpp_marca', $contacto->mar_nombre, ['class' => 'form-control', 'id' => 'select-marca','disabled' => 'disabled']) !!}
                                    @else
                                        {!! Form::text('cpp_marcadetalle', null, ['class' => 'form-control', 'id' => 'input-marca','disabled' => 'disabled']) !!}
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
                                    {!! Form::text('cpp_tiporig', $contacto->top_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_nombreorig', 'Nombre Origen:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpp_nombreorig', $contacto->cpp_nombreorig, ['class' => 'form-control','placeholder' => 'Nombre Origen', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_conformidad', 'Conformidad:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    @if($contacto->cpc_conformidad == 1)
                                        {!! Form::text('cpc_conformidad', 'Si', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    @elseif($contacto->cpc_conformidad == null)
                                        {!! Form::text('cpc_conformidad', '', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    @else
                                        {!! Form::text('cpc_conformidad', 'No', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_estado', 'Estado:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_estado', $contacto->epr_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_probcierre', 'Probabilidad Cierre:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_probcierre', $contacto->pci_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpp_vendedor', $contacto->ven_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_sistemact', 'Sistema Actual:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_sistemact', $contacto->sistemaActual->sist_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_sistemant', 'Sistema Anterior:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_sistemant', $contacto->sistemaAnterior->sist_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_sistemeva', 'Sistema Evaluados:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::select('cpc_sistemeva[]',$sistemas2, null, ['multiple' => 'multiple','class' => 'form-control margin', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('cpc_fechademo', 'Fecha Demo:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::date('cpc_fechademo', $contacto->cpc_fechademo == '1900-01-01' ? $contacto->cpc_fechademo = 'dd/mm/aaaa' : $contacto->cpc_fechademo, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('cpc_fechaimplemen', 'Año Implementación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::text('cpc_fechaimplemen',$contacto->cpc_fechaimplemen, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_conocsiac', 'Conocimiento Siac:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    @if($contacto->cpp_conocsiac == 0)
                                        {!! Form::text('cpp_conocsiac', 'No', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    @else
                                        {!! Form::text('cpp_conocsiac', 'Si', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('cpc_valorsist', 'Valor Sistema:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::number('cpc_valorsist', $contacto->cpc_valorsist, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_financia', 'Financiación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_financia', $contacto->fin_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_cantlicen', 'Cantidad Licencias:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_cantlicen', $contacto->cpc_cantlicen , ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('cpc_valorimpl', 'Valor Implementación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::number('cpc_valorimpl', $contacto->cpc_valorimpl, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('cpc_diasimple', 'Días Implementación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::number('cpc_diasimple',$contacto->cpc_diasimple, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('cpc_preciomanteni', 'Precio Mantenimiento:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::number('cpc_preciomanteni', $contacto->cpc_preciomanteni, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
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
                                    {!! Form::number('cpc_valortotal', $contacto->cpc_valortotal, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
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
                                    {!! Form::date('cpc_feccierre', $contacto->cpc_feccierre == '1900-01-01' ? $contacto->cpc_feccierre = 'dd/mm/aaaa' : $contacto->cpc_feccierre, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_motcierreneg', 'Motivo Cierre Negativo', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_motcierreneg', $contacto->mcn_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('cpc_fechareact', 'Fecha Re Activación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::date('cpc_fechareact', $contacto->cpc_fechareact == '1900-01-01' ? $contacto->cpc_fechareact = 'dd/mm/aaaa' : $contacto->cpc_fechareact, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('cpp_fechafac', 'Fecha Facturación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::date('cpp_fechafac', $contacto->cpp_fechafac == '1900-01-01' ? $contacto->cpp_fechafac = 'dd/mm/aaaa' : $contacto->cpp_fechafac, ['class' =>'form-control fechafact']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_numfac', 'Número de Factura:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpp_numfac', $contacto->cpp_numfac, ['class' => 'form-control numerofact','placeholder' => 'X-NN-NNNNNNNN']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a class="btn btn-primary" style="float: left;margin-left: 35px;" href="" id="btnfecfact">Editar Datos de Facturación </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-6">
                            <div class="alert alert-success" id="resultado" style="display: none;margin-top: 20px;"> Se guardo correctamente la información de Facturación</div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_confprovactual', 'Conf. Prov. Actual:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::text('cpc_confprovactual', $contacto->cpa_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="titulo_show">Datos de Contacto</div>
                    {!! Form::hidden('cpc_codigo', null) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('cpc_fecha', 'Fecha Realización:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::date('cpc_fecha', $contacto->cpc_fecha == '1900-01-01' ? $contacto->cpc_fecha = 'dd/mm/aaaa' : $contacto->cpc_fecha, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('cpc_fechaplanifica', 'Fecha Planificación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::date('cpc_fechaplanifica', $contacto->cpc_fechaplanifica, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_vendedor', $contacto->ven_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_modocontac', 'Modo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_modocontac', $contacto->mod_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_usuario', 'Nombre Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_usuario', $contacto->cpc_usuario, ['class' => 'form-control','placeholder' => 'Usuario', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_modalidadcontac', 'Modalidad de Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_modalidadcontac', $contacto->mco_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpc_tipocont', 'Tipo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpc_tipocont', $contacto->tco_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <a class="btn btn-small btn-primary" data-toggle="modal"
                                       data-target="#exampleModal"
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
                                    {!! Form::text('cpc_motivo', $contacto->cpc_motivo, ['class' => 'form-control','disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('cpc_detallecont', 'Detalle Contacto:', ['class' => 'control-label col-md-1']) !!}
                                <div class="col-md-11">
                                    {!! Form::textarea('cpc_detallecont', $contacto->cpc_detallecont, ['class' => 'form-control', 'rows' => 3,'placeholder' => 'Detalle Contacto', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('partials.contactos_poten_realizados')
                    <div class="titulo_show">Datos Próximos Contacto</div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('cpcp_fechaprox', 'Fecha Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::date('cpcp_fechaprox', $contacto->cpcp_fechaprox == '1900-01-01' ? $contacto->cpcp_fechaprox = 'dd/mm/aaaa' : $contacto->cpcp_fechaprox, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpcp_vendeprox', 'Vendedor Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpcp_vendeprox', $contacto->vendedor->ven_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpcp_usuarioprox', 'Nombre Usuario Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('cpcp_usuarioprox', $contacto->cpcp_usuarioprox, ['class' => 'form-control','placeholder' => 'Usuario Próximo Contacto', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('cpcp_detalleprox', 'Detalle Próximo Contacto:', ['class' => 'control-label col-md-1']) !!}
                                <div class="col-md-11">
                                    {!! Form::textarea('cpcp_detalleprox', $contacto->cpcp_detalleprox, ['class' => 'form-control', 'rows' => 3,'placeholder' => 'Detalle Próximo Contacto', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a class='btn btn-small btn-primary'
                                   href="{{ url('/prospectos_potenciales') }}">Volver</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </section>

    @include('partials.modal_adjuntos_poten')
    @include('partials.modal_histreplanifica')

@endsection

@section('scripts')


    <script type="text/javascript">

        
        $(document).ready(function () {

            $('#btnfecfact').click(function () {

                var prospecto_edit = {
                    codprospecto:$('.codprospecto').val(),
                    fechafact:$('.fechafact').val(),
                    numerofact:$('.numerofact').val()
                };

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '../fecfac',
                    type: 'POST',
                    data: prospecto_edit,
                    success: function (data) {

                        $("#resultado").show();

                        window.setTimeout(function () {
                            $("#resultado").slideUp(500, function () {
                                $("#resultado").hide();
                            });
                        }, 5000);

                        var fecfact = $('.fechafact').val();
                        var nrofact = $('.numerofact').val();


                        $('.fechafact').html(fecfact);
                        $('.numerofact').html(nrofact);

                    }
                });

                return false;

            });


        });
        
    </script>
    
    
    
@endsection