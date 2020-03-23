@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Sistemas
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::model($sistema,['method' => 'PATCH','route'=>['sistemas.update',$sistema->sist_codigo]]) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Editar Sistema</h3>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('sist_codigo', 'Código:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input">
                                        {!! Form::text('sist_codigo', null, ['class' => 'form-control','placeholder' => 'Código','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('sist_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('sist_nombre', 'Nombre:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('sist_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                    @if ($errors->has('sist_nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sist_nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" id="enviar" value="Guardar" class="btn btn-primary"/>
                                    <a class="btn btn-primary" href='{{URL::to('/sistemas/create')}}'>Cancelar</a>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    @include('partials.sistemas_listado')
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
        $('#confirmDeletesist').on('show.bs.modal', function (e) {

            var sist_Id = $(e.relatedTarget).data('sist_codigo');
            var sist_Name = $(e.relatedTarget).data('sist_nombre');

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar el Sistema ' + sist_Name + ' ?')
            modal.find('.modal-body .sist_codigo input').val(sist_Id)
            modal.find('.modal-body .sist_nombre input').val(sist_Name)

            $("#delForm").attr('action', sist_Id);

        });
    </script>
@endsection
