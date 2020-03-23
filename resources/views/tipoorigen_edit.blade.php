@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Tipo de Origen
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::model($tipoorigen,['method' => 'PATCH','route'=>['tipoorigen.update',$tipoorigen->to_codigo]]) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Editar Tipo de Origen</h3>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('to_codigo', 'Código:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input">
                                        {!! Form::text('to_codigo', null, ['class' => 'form-control','placeholder' => 'Código','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('to_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('to_nombre', 'Nombre:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('to_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                    @if ($errors->has('to_nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('to_nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" id="enviar" value="Guardar" class="btn btn-primary"/>
                                    <a class="btn btn-primary" href='{{URL::to('/tipoorigen/create')}}'>Cancelar</a>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    @include('partials.tipoorigen_listado')
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
        $('#confirmDeletetipoorig').on('show.bs.modal', function (e) {

            var tipoor_Id = $(e.relatedTarget).data('tipoor_codigo');
            var tipoor_Name = $(e.relatedTarget).data('tipoor_nombre');

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar el Tipo de Origen ' + tipoor_Name + ' ?')
            modal.find('.modal-body .tipoor_codigo input').val(tipoor_Id)
            modal.find('.modal-body .tipoor_nombre input').val(tipoor_Name)

            $("#delForm").attr('action', tipoor_Id);

        });
    </script>
@endsection
