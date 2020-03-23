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

                        <a href="{{ url('/prospectos') }}">
                            <button class="btn btn-primary">Listado de Prospectos</button>
                        </a>

                        <a class="btn btn-small btn-primary" data-toggle="modal"
                           data-target="#histreplanifica">Ver Historial de RePlanificación</a>

                        <div class="square-widget">
                            <div class="widget-container">
                                <div class="stepy-tab">
                                </div>
                                {!! Form::model($prospectos, array('route' => ['form.update',$prospectos->pro_codigo], 'method' => 'PUT', 'name' => 'form', 'enctype' =>'multipart/form-data','id' => 'default')) !!}
                                {!! Form::hidden('editProsp', 2) !!}

                                {!! Form::datetime('fechacarga', \Carbon\Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString(),["style" =>"display: none"]) !!}

                                <fieldset title="Información Cliente">
                                    <legend>Información Cliente</legend>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('con_nombre', 'Cliente:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('con_nombre', $prospectos->conces->con_nombre, ['class' => 'form-control', 'placeholder' => 'Nombre Empresa']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_conces', 'Código Empresa:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('pro_conces', null, ['class' => 'form-control','placeholder' => 'Código Empresa']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_codigo', 'Código Prospecto:', ['class' => 'control-label col-md-7']) !!}
                                                <div class="col-md-5">
                                                    {!! Form::text('pro_codigo', null, ['class' => 'form-control','placeholder' => 'Código Prospecto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_categoria', 'Categoría:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('pro_categoria',$categorias, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_clasprod', 'Clase Producto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('pro_clasprod', $clasesProducto, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_producto', 'Producto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('pro_producto', $productos, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_detalleprod', 'Descripción Producto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('pro_detalleprod', null, ['class' => 'form-control', 'placeholder' => 'Descripción Producto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_encuesta', 'Encuesta:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_encuesta',$encuestas, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_nombrecamp', 'Nombre Campaña:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('pro_nombrecamp', $campanias,null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_tiporig', 'Tipo Origen:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('pro_tiporig', $tipoOrigen,null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_nombreorig', 'Nombre Origen:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('pro_nombreorig', null, ['class' => 'form-control','placeholder' => 'Horas']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_estado', 'Estado:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_estado', $estadoProspecto,null, ['class' => 'form-control', 'onChange' => 'comprobar()']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_probcierre', 'Probabilidad Cierre:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_probcierre', $probCierre, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('pro_vendedor', $vendedores, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('coc_cotizapro', 'Cotización Producto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('coc_cotizapro', null, ['class' => 'form-control', 'onChange' => 'fncSumar()', 'maxlength' => '30']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('coc_cantdias', 'Cantidad Días:', ['class' => 'control-label col-md-7']) !!}
                                                <div class="col-md-5">
                                                    {!! Form::text('coc_cantdias', null, ['class' => 'form-control','placeholder' => 'Dias', 'id' => 'entero3', 'maxlength' => '6','onkeypress' => 'return NumCheck(event, this)']) !!}
                                                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_modprest', 'Modalidad Prestación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_modprest', $modPrestacion,null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('coc_cotizaserv', 'Cotización Servicio:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('coc_cotizaserv', null, ['class' => 'form-control' ,'onChange' => 'fncSumar()' ,'maxlength' => '30']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('coc_canthoras', 'Cantidad Horas:', ['class' => 'control-label col-md-7']) !!}
                                                <div class="col-md-5">
                                                    {!! Form::text('coc_canthoras', null, ['class' => 'form-control','placeholder' => 'Horas', 'maxlength' => '6','onkeypress' => 'return NumCheck(event, this)']) !!}
                                                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_financia', 'Financiación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_financia', $financiacion, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('coc_cotizatotal', 'Cotización Total:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::number('coc_cotizatotal', null, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('coc_fechademo', 'Fecha Demo:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::date('coc_fechademo', $prospectos->coc_fechademo == '1900-01-01' ? $prospectos->coc_fechademo = 'dd/mm/aaaa' : $prospectos->coc_fechademo, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('coc_feccierre', 'Fecha Cierre:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::date('coc_feccierre', $prospectos->coc_feccierre == '1900-01-01' ? $prospectos->coc_feccierre = 'dd/mm/aaaa' : $prospectos->coc_feccierre, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_MotCierreNeg', 'Motivo Cierre Negativo:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_MotCierreNeg', $motCierreNeg, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('pro_fechafac', 'Fecha de Factura:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::date('pro_fechafac', $prospectos->pro_fechafac == '1900-01-01' ? $prospectos->pro_fechafac = 'dd/mm/aaaa' : $prospectos->pro_fechafac, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('pro_numfac', 'Número de Factura:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('pro_numfac', null, ['class' => 'form-control','placeholder' => 'X-NN-NNNNNNNN']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('partials.contactos_realizados')
                                </fieldset>
                                <fieldset title="Datos de Contacto">
                                    <legend>Datos de Contacto</legend>
                                    {!! Form::hidden('coc_codigo', null) !!}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('coc_fecha', 'Fecha Realización:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {{--{!! Form::date('coc_fecha', \Carbon\Carbon::now()->toDateString(), ['class' =>'form-control', 'min' => \Carbon\Carbon::yesterday()->toDateString(), 'max' => \Carbon\Carbon::now()->toDateString()]) !!}--}}
                                                    {!! Form::date('coc_fecha', \Carbon\Carbon::now()->toDateString(), ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                {!! Form::label('coc_fechaplanifica', 'Fecha Planificación:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-lg-7">
                                                    {!! Form::date('coc_fechaplanifica', null, ['class' =>'form-control']) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_vendedor', $vendedores, Auth::user()->ven_codigo, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_modocontac', 'Modo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_modocontac', $modoContac,1, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_usuario', 'Nombre Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('coc_usuario', '', ['class' => 'form-control','placeholder' => 'Usuario']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_modcont', 'Modalidad de Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_modcont', $modContacto, 1, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_tipocont', 'Tipo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('coc_tipocont', $tipoContac,null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('coc_adjunto', 'Adjuntar:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="controls col-md-7">
                                                    {!! Form::file('coc_adjunto', ['class' => 'filestyle','data-buttonName' => 'btn btn-primary', 'data-buttonText' => 'Buscar']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-7">
                                                    <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#exampleModal"
                                                       data-whatever="{{$prospectos->pro_codigo}}">Ver Archivos Adjuntos</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('coc_motivo', 'Motivo:', ['class' => 'control-label col-md-1']) !!}
                                                <div class="col-md-11">
                                                    {!! Form::text('coc_motivo', '', ['class' => 'form-control','placeholder' => 'Motivo Contacto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('coc_detallecont', 'Detalle Contacto:', ['class' => 'control-label col-md-1']) !!}
                                                <div class="col-md-11">
                                                    {!! Form::textarea('coc_detallecont', '', ['class' => 'form-control', 'rows' => 3,'placeholder' => 'Detalle Contacto']) !!}
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
                                                {!! Form::label('comp_fechaprox', 'Fecha Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::date('comp_fechaprox', null, ['class' =>'form-control', 'min' => \Carbon\Carbon::now()->toDateString()]) !!}
                                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('comp_vendeprox', 'Vendedor Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::select('comp_vendeprox', $vendedores, 1, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('comp_usuarioprox', 'Nombre Usuario Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                                <div class="col-md-7">
                                                    {!! Form::text('comp_usuarioprox', null, ['class' => 'form-control','placeholder' => 'Usuario Próximo Contacto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                {!! Form::label('comp_detalleprox', 'Detalle Próximo Contacto:', ['class' => 'control-label col-md-1']) !!}
                                                <div class="col-md-11">
                                                    {!! Form::textarea('comp_detalleprox', '', ['class' => 'form-control', 'rows' => 3,'placeholder' => 'Detalle Próximo Contacto']) !!}
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

    @include('partials.modal_adjuntos')
    @include('partials.modal_histreplanifica')

@endsection
@section('scripts')
    <script src="{{asset('assets/js/crm.js')}}"></script>
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
@endsection