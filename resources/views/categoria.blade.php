@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Categorías
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::open(array('url' => 'categoria','method' => 'post')) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Cargar Nueva Categoría</h3>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('cate_codigo', 'Código:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input">
                                        {!! Form::text('cate_codigo', null, ['class' => 'form-control','placeholder' => 'Código','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('cate_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('cate_nombre', 'Nombre:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('cate_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                    @if ($errors->has('cate_nombre'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('cate_nombre') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('cate_abrevia') ? ' has-error' : '' }}">
                                {!! Form::label('cate_abrevia', 'Abreviación:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('cate_abrevia', null, ['class' => 'form-control','placeholder' => 'Abreviación']) !!}
                                    </div>
                                    @if ($errors->has('cate_abrevia'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('cate_abrevia') }}</strong>
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
                    @include('partials.categoria_listado')
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
    <script>
        $('#confirmDeletecate').on('show.bs.modal', function (e) {

            var cate_codigo = $(e.relatedTarget).data('cate_codigo');
            var cate_nombre = $(e.relatedTarget).data('cate_nombre');
            var cate_abrevia = $(e.relatedTarget).data('cate_abrevia');

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar la Categoría ' + cate_nombre + ' ?');
            modal.find('.modal-body .cate_codigo input').val(cate_codigo);
            modal.find('.modal-body .cate_nombre input').val(cate_nombre);
            modal.find('.modal-body .cate_abrevia input').val(cate_abrevia);

            $("#delForm").attr('action', cate_codigo);

        });
    </script>
@endsection
