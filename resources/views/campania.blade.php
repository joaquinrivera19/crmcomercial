@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Campaña
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::open(array('url' => 'campania','method' => 'post')) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Cargar Nueva Campaña</h3>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('cam_codigo', 'Código:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input">
                                        {!! Form::text('cam_codigo', null, ['class' => 'form-control','placeholder' => 'Código','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('cam_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('cam_nombre', 'Nombre:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('cam_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                    @if ($errors->has('cam_nombre'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('cam_nombre') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('cam_fecini') ? ' has-error' : '' }}">
                                {!! Form::label('cam_fecini', 'Fecha Inicio:', ['class' => 'control-label col-md-3']) !!}

                                <div class="col-lg-9">
                                    <div class='input-group date'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                        {!! Form::date('cam_fecini', \Carbon\Carbon::now(), ['class' =>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('cam_fecini'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('cam_fecini') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('cam_fecfin') ? ' has-error' : '' }}">
                                {!! Form::label('cam_fecfin', 'Fecha Fin:', ['class' => 'control-label col-md-3']) !!}

                                <div class="col-lg-9">
                                    <div class='input-group date'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                        {!! Form::date('cam_fecfin', \Carbon\Carbon::now(), ['class' =>'form-control']) !!}
                                    </div>
                                    @if ($errors->has('cam_fecfin'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('cam_fecfin') }}</strong>
                                            </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('cam_estado') ? ' has-error' : '' }}">
                                {!! Form::label('cam_estado', 'Estado:', ['class' => 'control-label col-md-3']) !!}

                                <div class="col-lg-9">
                                    <div class="slide-toggle">
                                        <div>
                                            {!! Form::checkbox('cam_estado', '1', true,['data-label-width' => '20']) !!}
                                        </div>
                                        @if ($errors->has('cam_estado'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cam_estado') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('cam_abrevia') ? ' has-error' : '' }}">
                                {!! Form::label('cam_abrevia', 'Abreviación:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('cam_abrevia', null, ['class' => 'form-control','placeholder' => 'Abreviación']) !!}
                                    </div>
                                    @if ($errors->has('cam_abrevia'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('cam_abrevia') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" id="enviar" value="Guardar" class="btn btn-primary"/>
                                    <input type="reset" value="Cancelar" class="btn btn-primary">
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    @include('partials.campania_listado')
                </div>
            </div>
        </div>

    </section>

    <!--MODAL PARA ALERTA DE USUARIO LOGUEADO-->
    @include('partials.modal_alertas')
    @include('partials.modal_exitos')
            <!--MODAL PARA ALERTA DE USUARIO LOGUEADO-->

@endsection
@section('scripts')
    @if(Session::get('alert'))
        <script>
            $('#modal_alertas').modal('show');
        </script>
    @elseif(Session::get('success'))
        <script>
            $('#modal_exitos').modal('show');
        </script>
    @endif
    <script src="{{asset('assets/js/bootstrap-switch.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        $('#confirmDelete').on('show.bs.modal', function (e) {

            var campaniaId = $(e.relatedTarget).data('camp_id');
            var campaniaName = $(e.relatedTarget).data('camp_name');
            var campaniafecini = $(e.relatedTarget).data('camp_fecini');
            var campaniafecfin = $(e.relatedTarget).data('camp_fecfin');

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar la Campaña ' + campaniaName + ' ?');
            modal.find('.modal-body .camp_codigo input').val(campaniaId);
            modal.find('.modal-body .camp_nombre input').val(campaniaName);
            modal.find('.modal-body .camp_fecini input').val(campaniafecini);
            modal.find('.modal-body .camp_fecfin input').val(campaniafecfin);

//            $("#confirmDelete #pName").val(campaniaName);
            $("#delForm").attr('action', campaniaId);

        });
    </script>
@endsection