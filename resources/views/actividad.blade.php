@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Actividad
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::open(array('url' => 'actividad','method' => 'post')) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Cargar Nueva Actividad</h3>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('act_codigo', 'Código:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input">
                                        {!! Form::text('act_codigo', null, ['class' => 'form-control','placeholder' => 'Código','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('act_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('act_nombre', 'Nombre:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('act_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                    @if ($errors->has('act_nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('act_nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('act_abrevia') ? ' has-error' : '' }}">
                                {!! Form::label('act_abrevia', 'Abreviación:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('act_abrevia', null, ['class' => 'form-control','placeholder' => 'Abreviación']) !!}
                                    </div>
                                    @if ($errors->has('act_abrevia'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('act_abrevia') }}</strong>
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
                    @include('partials.actividad_listado')
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
        $('#confirmDeleteact').on('show.bs.modal', function (e) {

            var act_Id = $(e.relatedTarget).data('act_codigo');
            var act_Name = $(e.relatedTarget).data('act_nombre');
            var act_Abrevia = $(e.relatedTarget).data('act_abrevia');

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar el Sistema ' + act_Name + ' ?')
            modal.find('.modal-body .act_codigo input').val(act_Id)
            modal.find('.modal-body .act_nombre input').val(act_Name)
            modal.find('.modal-body .act_abrevia input').val(act_Abrevia)

            $("#delForm").attr('action', act_Id);

        });
    </script>
@endsection
