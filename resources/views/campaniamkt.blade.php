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
                            {!! Form::open(array('url' => 'campaniamkt','method' => 'post', 'enctype' =>'multipart/form-data', 'id' => 'form')) !!}

                            {!! Form::hidden('camk_feccarga', \Carbon\Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString()) !!}
                            {!! Form::hidden('sigcodigo',$sigcodigo) !!}

                            <h3 class="form-section">Cargar Nueva Campaña MKT</h3>

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
                                            {!! Form::hidden('camk_url_img', 'http://sorzana.com/desarrollo/actualizar/BannerSIAC/ImagenesMkt/'.$sigcodigo)!!}
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
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                     alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Seleccione una Imagen</span>
                                                   <span class="fileupload-exists"><i
                                                               class="fa fa-undo"></i> Cambiar</span>
                                                   <input type="file" class="default" name="camk_foto" id="camk_foto"/>
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists"
                                                   data-dismiss="fileupload"><i class="fa fa-trash"></i> Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('camk_estado', 'Habilitado: ', ['class' => 'control-label col-md-3']) !!}
                                    <div class="col-md-9">
                                        <div class="slide-toggle">
                                            {!! Form::checkbox('camk_estado', '1', true,['class' => 'form-control js-switch']) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="but_finish_post">
                                            <button class="btn btn-default"><i class="fa fa-spinner fa-spin"></i>
                                                Subiendo Imagen...
                                            </button>
                                        </div>

                                        <input type="submit" value="Guardar" class="btn btn-primary" id="but_finish"/>
                                        <input type="reset" value="Cancelar" class="btn btn-primary" id="but_cancelar">

                                    </div>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                        <div class="col-lg-3"></div>
                    </div>

                    @include('partials.campaniamkt_listado')

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

    <script>

        $(document).ready(function () {
            var but_finish_post = document.getElementById('but_finish_post');
            var but_cancelar = document.getElementById('but_cancelar');
            var but_finish = document.getElementById('but_finish');
            but_finish_post.style.display = 'none';

            $('#but_finish').click(function () {
                if (!($('#camk_foto').val() === '')){


                    if ( (/\.(jpg|jpeg|png)$/i).test($('#camk_foto').val() )) {

                        but_finish_post.style.display = '';
                        $('#but_finish_post *').attr('disabled', true);

                        but_cancelar.style.display = 'none';
                        but_finish.style.visibility = 'hidden';

                    }else{
                        alert('Seleccione un tipo de archivo válido');
                        return false;
                    }


                }

            });
        });

    </script>

    <script>

        jQuery(function ($) {
            $('#form').validate({
                rules: {
                    camk_foto:{
                        required: true
                    }
                },
                messages: {},
                errorElement : 'div',
                errorLabelContainer: '.errores'
            });
        })

    </script>

@endsection
