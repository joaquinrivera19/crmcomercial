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
                        {!! Form::model($campania,['method' => 'PATCH','route'=>['campania.update',$campania->cam_codigo]]) !!}
                        <h3 class="form-section">Editar Campaña</h3>

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
                                        {!! Form::date('cam_fecini', null, ['class' =>'form-control']) !!}
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
                                        {!! Form::date('cam_fecfin', null, ['class' =>'form-control']) !!}
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
                                        @if($campania->cam_estado == 1)
                                            {!! Form::checkbox('cam_estado', '1', true,['data-label-width' => '20']) !!}
                                        @else
                                            {!! Form::checkbox('cam_estado', '0', false,['data-label-width' => '20']) !!}
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
                                    <a class="btn btn-primary" href='{{URL::to('/campania/create')}}'>Cancelar</a>
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

            var productId = $(e.relatedTarget).data('product_id');
            var productName = $(e.relatedTarget).data('product_name');
            var productfecini = $(e.relatedTarget).data('product_fecini');
            var productfecfin = $(e.relatedTarget).data('product_fecfin');

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar la Campaña ' + productName + ' ?')
            modal.find('.modal-body .campa_codigo input').val(productId)
            modal.find('.modal-body .campa_nombre input').val(productName)
            modal.find('.modal-body .campa_fecini input').val(productfecini)
            modal.find('.modal-body .campa_fecfin input').val(productfecfin)

            $("#confirmDelete #pName").val(productName);
            $("#delForm").attr('action', 'put your action here with productId');

        });
    </script>
@endsection