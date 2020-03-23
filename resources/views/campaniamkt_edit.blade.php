@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Campaña MKT
                </header>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">

                            {!! Form::model($campaniamkt,['method' => 'PATCH','route'=>['campaniamkt.update',$campaniamkt->camk_codigo], 'id' => 'form', 'enctype' =>'multipart/form-data' ]) !!}

                            {!! Form::hidden('camk_feccarga', null) !!}

                            <h3 class="form-section">Editar Campaña MKT</h3>

                            <div class="row">
                                <div class="form-group{{ $errors->has('camk_codigo') ? ' has-error' : '' }}">
                                    {!! Form::label('camk_codigo', 'Código: ', ['class' => 'control-label col-md-3']) !!}
                                    <div class="col-lg-9">
                                        <div class="iconic-input right">
                                            {!! Form::text('camk_codigo', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                        </div>
                                        @if ($errors->has('camk_codigo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('camk_codigo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group{{ $errors->has('camk_descripcion') ? ' has-error' : '' }}">
                                    {!! Form::label('camk_descripcion', 'Descripción: ', ['class' => 'control-label col-md-3']) !!}
                                    <div class="col-lg-9">
                                        <div class="iconic-input right">
                                            {!! Form::text('camk_descripcion', null, ['class' => 'form-control','placeholder' => 'Descripción']) !!}
                                        </div>
                                        @if ($errors->has('camk_descripcion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('camk_descripcion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group{{ $errors->has('camk_url') ? ' has-error' : '' }}">
                                    {!! Form::label('camk_url', 'URL:', ['class' => 'control-label col-md-3']) !!}
                                    <div class="col-lg-9">
                                        <div class="iconic-input right">
                                            {!! Form::text('camk_url', null, ['class' => 'form-control'])!!}
                                        </div>
                                        @if ($errors->has('camk_url'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('camk_url') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">Cargar Imagen: </label>
                                    <div class="col-md-9">
                                        <div class="iconic-input right">
                                            <img src="{{$campaniamkt->camk_url_img}}" alt=""
                                                 style="width:100%; border:1px solid grey">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('camk_estado', 'Habilitado: ', ['class' => 'control-label col-md-3']) !!}
                                    <div class="col-md-9">
                                        <div class="slide-toggle">
                                            @if($campaniamkt->camk_estado == 1)
                                                {!! Form::checkbox('camk_estado', '1', true,['class' => 'form-control js-switch']) !!}
                                            @else
                                                {!! Form::checkbox('camk_estado', '0', false,['class' => 'form-control js-switch']) !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Guardar" class="btn btn-primary"/>
                                        <a class="btn btn-primary" href='{{URL::to('/campaniamkt/create')}}'>Cancelar</a>
                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                        <div class="col-lg-3"></div>
                    </div>

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

    <script src="{{asset('assets/js/bootstrap-fileupload.min.js')}}"></script>

    <script src="{{asset('https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js')}}"></script>
    <!--ios7-->
    <script src="{{asset('assets/js/ios-switch/switchery.js')}}"></script>
    <script src="{{asset('assets/js/ios-switch/ios-init.js')}}"></script>

    @if(Session::get('alert'))
        <script>
            $('#modal_alertas').modal('show');
        </script>
    @elseif(Session::get('success'))
        <script>
            $('#modal_exitos').modal('show');
        </script>
    @endif

@endsection
