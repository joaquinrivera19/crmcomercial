@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Empresa de Consultoría
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::open(array('url' => 'concesconsultoria','method' => 'post')) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Cargar Nueva Empresas de Consultoría</h3>

                        <div class="row">
                            <div class="form-group">
                                <div class="form-group{{ $errors->has('con_codigo') ? ' has-error' : '' }}">
                                    {!! Form::label('con_codigo', 'Código:', ['class' => 'control-label col-md-3']) !!}
                                    <div class="col-lg-9">
                                        <div class="iconic-input">
                                            {!! Form::text('con_codigo', null, ['class' => 'form-control','placeholder' => 'Código']) !!}
                                        </div>
                                        @if ($errors->has('con_codigo'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('con_codigo') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('con_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('con_nombre', 'Nombre:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('con_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                    @if ($errors->has('con_nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('con_nombre') }}</strong>
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
                    @include('partials.concesconsultoria_listado')
                </div>
            </div>
        </div>

    </section>

    @include('partials.modal_alertas')
    @include('partials.modal_exitos')

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
        $('#confirmDeleteConces').on('show.bs.modal', function (e) {

            var con_codigo = $(e.relatedTarget).data('con_codigo');
            var con_nombre = $(e.relatedTarget).data('con_nombre');

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar la empresa de consultoría ' + con_nombre + ' ?')
            modal.find('.modal-body .con_codigo input').val(con_codigo)
            modal.find('.modal-body .con_nombre input').val(con_nombre)

            $("#delForm").attr('action', con_codigo);

        });
    </script>
@endsection
