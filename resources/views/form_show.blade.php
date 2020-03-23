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
                                   href='{{URL::to('/form/'.$contacto->pro_codigo.'/edit')}}'><i class='fa fa-plus'></i>
                                    Cargar Contacto</a>
                            @endif
                        </div>

                        <div class="btn-group">
                            @if(Auth::user()->ven_menu == 1)
                                <a class='btn btn-success' role='button'
                                   href='{{URL::to('/form/'.$contacto->pro_codigo.'/editProspecto')}}'><i
                                            class='fa fa-edit'></i> Editar Prospecto</a>
                            @endif
                        </div>

                        <div class="btn-group">
                             <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#histreplanifica">Ver Historial de RePlanificación</a>
                        </div>

                    </span>
                    {!! Form::model(array('route' => ['form'], 'method' => 'PUT', 'name' => 'form')) !!}

                    <div class="titulo_show">Información Cliente</div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('con_nombre', 'Cliente:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('con_nombre', $contacto->con_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_conces', 'Código Empresa:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_conces', $contacto->pro_conces, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_codigo', 'Código Prospecto:', ['class' => 'control-label col-md-7']) !!}
                                <div class="col-md-5">
                                    {!! Form::text('pro_codigo', $contacto->pro_codigo, ['class' => 'form-control codprospecto', 'readOnly' => 'readOnly']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_categoria', 'Categoría:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_categoria',$contacto->cate_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_clasprod', 'Clase Producto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_clasprod', $contacto->cp_Nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_producto', 'Producto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_producto', $contacto->prod_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_detalleprod', 'Descripción Producto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_detalleprod', $contacto->pro_detalleprod, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_encuesta', 'Encuesta:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_encuesta',$contacto->enc_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_nombrecamp', 'Nombre Campaña:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_nombrecamp', $contacto->cam_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_tiporig', 'Tipo Origen:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_tiporig', $contacto->to_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_nombreorig', 'Nombre Origen:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_nombreorig', $contacto->pro_nombreorig, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_estado', 'Estado:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_estado', $contacto->epr_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_probcierre', 'Probabilidad Cierre:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_probcierre', $contacto->pci_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_vendedor', $contacto->prospecto->vendedor->ven_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('coc_cotizapro', 'Cotización Producto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_cotizapro', $contacto->coc_cotizapro, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('coc_cantdias', 'Cantidad Días:', ['class' => 'control-label col-md-7']) !!}
                                <div class="col-md-5">
                                    {!! Form::text('coc_cantdias', $contacto->coc_cantdias, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_modprest', 'Modalidad Prestación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_modprest', $contacto->mpr_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('coc_cotizaserv', 'Cotización Servicio:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_cotizaserv', $contacto->coc_cotizaserv, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('coc_canthoras', 'Cantidad Horas:', ['class' => 'control-label col-md-7']) !!}
                                <div class="col-md-5">
                                    {!! Form::text('coc_canthoras', $contacto->coc_canthoras, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-time form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_financia', 'Financiación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_financia', $contacto->fin_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('coc_cotizatotal', 'Cotización Total:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_cotizatotal', $contacto->coc_cotizatotal, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
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
                                    {!! Form::date('coc_fechademo', $contacto->coc_fechademo == '1900-01-01' ? $contacto->coc_fechademo = 'dd/mm/aaaa' : $contacto->coc_fechademo, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('coc_feccierre', 'Fecha Cierre:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::date('coc_feccierre', $contacto->coc_feccierre == '1900-01-01' ? $contacto->coc_feccierre = 'dd/mm/aaaa' : $contacto->coc_feccierre, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_MotCierreNeg', 'Motivo Cierre Negativo:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_MotCierreNeg', $contacto->mcn_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('pro_fechafac', 'Fecha de Factura:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::date('pro_fechafac', $contacto->pro_fechafac == '1900-01-01' ? $contacto->pro_fechafac = 'dd/mm/aaaa' : $contacto->pro_fechafac, ['class' =>'form-control fechafact']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('pro_numfac', 'Número de Factura:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('pro_numfac', $contacto->pro_numfac, ['class' => 'form-control numerofact','placeholder' => 'X-NN-NNNNNNNN']) !!}
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

                    <div class="titulo_show">Datos de Contacto</div>
                    {!! Form::hidden('coc_codigo', null) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('coc_fecha', 'Fecha Realización:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {{--{!! Form::date('coc_fecha', \Carbon\Carbon::now()->toDateString(), ['class' =>'form-control', 'min' => \Carbon\Carbon::yesterday()->toDateString(), 'max' => \Carbon\Carbon::now()->toDateString(), 'disabled' => 'disabled']) !!}--}}
                                    {!! Form::date('coc_fecha', $contacto->coc_fecha, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('coc_fechaplanifica', 'Fecha Planificación:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-lg-7">
                                    {!! Form::date('coc_fechaplanifica', $contacto->coc_fechaplanifica, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_vendedor', 'Vendedor:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_vendedor', $contacto->vendedor->ven_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_modocontac', 'Modo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_modocontac', $contacto->mod_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_usuario', 'Nombre Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_usuario', $contacto->coc_usuario, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_modcont', 'Modalidad de Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_modcont', $contacto->mco_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('coc_tipocont', 'Tipo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('coc_tipocont', $contacto->tco_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-5"></div>
                                <div class="col-md-7">
                                    <a class="btn btn-small btn-primary" data-toggle="modal" data-target="#exampleModal"
                                       data-whatever="{{$contacto->pro_codigo}}">Ver Archivos Adjuntos</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('coc_motivo', 'Motivo:', ['class' => 'control-label col-md-1']) !!}
                                <div class="col-md-11">
                                    {!! Form::text('coc_motivo', $contacto->coc_motivo, ['class' => 'form-control','placeholder' => 'Motivo Contacto', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('coc_detallecont', 'Detalle Contacto:', ['class' => 'control-label col-md-1']) !!}
                                <div class="col-md-11">
                                    {!! Form::textarea('coc_detallecont', $contacto->coc_detallecont, ['class' => 'form-control', 'rows' => 3,'placeholder' => 'Detalle Contacto', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('partials.contactos_realizados')

                    <div class="titulo_show">Datos Próximos Contacto</div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                {!! Form::label('comp_fechaprox', 'Fecha Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::date('comp_fechaprox', $contacto->comp_fechaprox == '1900-01-01' ? $contacto->comp_fechaprox = 'dd/mm/aaaa' : $contacto->comp_fechaprox, ['class' =>'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('comp_vendeprox', 'Vendedor Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('comp_vendeprox', $contacto->contactoProx->comp_vendeprox == 0 ? $contacto->ven_nombre : $contacto->contactoProx->vendedor->ven_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('comp_usuarioprox', 'Nombre Usuario Próximo Contacto:', ['class' => 'control-label col-md-5']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('comp_usuarioprox', $contacto->comp_usuarioprox, ['class' => 'form-control','placeholder' => 'Usuario Próximo Contacto','disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('comp_detalleprox', 'Detalle Próximo Contacto:', ['class' => 'control-label col-md-1']) !!}
                                <div class="col-md-11">
                                    {!! Form::textarea('comp_detalleprox', $contacto->comp_detalleprox, ['class' => 'form-control', 'rows' => 3, 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a class='btn btn-small btn-primary' href="{{ url('/prospectos') }}">Volver</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>
    @include('partials.modal_adjuntos')
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
                    url: '../fecfacconsult',
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
