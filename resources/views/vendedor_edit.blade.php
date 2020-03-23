@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Vendedores
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::model($vendedor,['method' => 'PATCH','enctype' =>'multipart/form-data','route'=>['vendedor.update',$vendedor->ven_codigo]]) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Editar Vendedor</h3>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('ven_codigo', 'Código:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input">
                                        {!! Form::text('ven_codigo', null, ['class' => 'form-control','placeholder' => 'Código','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('to_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('ven_nombre', 'Nombre:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('ven_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                </div>
                                @if ($errors->has('ven_nombre'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('ven_nombre') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('to_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('username', 'Usuario:', ['class' => 'control-label col-md-3']) !!}

                                <div class="col-lg-9">
                                    <div class='input-group date'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                        {!! Form::text('username', null, ['class' => 'form-control','placeholder' => 'Usuario']) !!}
                                    </div>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('to_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('password', 'Contraseña:', ['class' => 'control-label col-md-3']) !!}

                                <div class="col-lg-9">
                                    <div class='input-group date'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                                        {!! Form::password('password', array('class' => 'form-control','placeholder' => 'Contraseña')) !!}
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                {!! Form::label('password_confirmation', 'Contraseña:', ['class' => 'control-label col-md-3']) !!}

                                <div class="col-lg-9">
                                    <div class='input-group date'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                                        {!! Form::password('password_confirmation', array('class' => 'form-control','placeholder' => 'Confirmar Contraseña')) !!}
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('to_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('ven_email', 'EMail:', ['class' => 'control-label col-md-3']) !!}

                                <div class="col-lg-9">
                                    <div class='input-group date'>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                        {!! Form::text('ven_email', null, ['class' => 'form-control','placeholder' => 'Email']) !!}
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if($vendedor->ven_foto)
                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('ven_foto', 'Foto Actual:', ['class' => 'control-label col-md-3']) !!}
                                    <div class="col-lg-9">
                                        <div class="iconic-input right">
                                            <img src="{{asset('storage/'.$vendedor->ven_foto)}}" alt=""
                                                 style="width:100%; border:1px solid grey">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('ven_foto', 'Foto:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::file('ven_foto', ['class' => 'filestyle','data-buttonName' => 'btn btn-primary', 'data-buttonText' => 'Elija el Archivo']) !!}
                                    </div>
                                    @if ($errors->has('ven_foto'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('ven_foto') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('to_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('ven_estado', 'Estado:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="slide-toggle">
                                        @if($vendedor->ven_estado == 1)
                                            {!! Form::checkbox('ven_estado', '1', true,['data-label-width' => '20']) !!}
                                        @else
                                            {!! Form::checkbox('ven_estado', '0', false,['data-label-width' => '20']) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" id="enviar" value="Guardar" class="btn btn-primary"/>
                                    <a class="btn btn-primary" href='{{URL::to('/vendedor/create')}}'>Cancelar</a>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    @include('partials.vendedor_listado')
                </div>
            </div>
        </div>

    </section>

@endsection
@section('scripts')
    <script src="{{asset('assets/js/bootstrap-switch.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        $('#confirmDeletevend').on('show.bs.modal', function (e) {

            var vendeId = $(e.relatedTarget).data('ven_codigo');
            var vendeName = $(e.relatedTarget).data('ven_nombre');
            var vendeUsuario = $(e.relatedTarget).data('ven_usuario');
            var vendeEmail = $(e.relatedTarget).data('ven_email');
            var vendeEstado = $(e.relatedTarget).data('ven_estado');

            if (vendeEstado == 1) {
                var vendeEstado = 'Habilitado';
            } else {
                var vendeEstado = 'Deshabilitado';
            }

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar el Vendedor ' + vendeName + ' ?')
            modal.find('.modal-body .ven_codigo input').val(vendeId)
            modal.find('.modal-body .ven_nombre input').val(vendeName)
            modal.find('.modal-body .ven_usuario input').val(vendeUsuario)
            modal.find('.modal-body .ven_email input').val(vendeEmail)
            modal.find('.modal-body .ven_estado input').val(vendeEstado)

            $("#delForm").attr('action', vendeId);

        });
    </script>
@endsection
