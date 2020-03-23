@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Modalidad de Contacto
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::model($modcontacto,['method' => 'PATCH','route'=>['modcontacto.update',$modcontacto->mco_codigo]]) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Editar Modalidad de Contacto</h3>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('mco_codigo', 'Código:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input">
                                        {!! Form::text('mco_codigo', null, ['class' => 'form-control','placeholder' => 'Código','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('mco_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('mco_nombre', 'Nombre:', ['class' => 'control-label col-md-3']) !!}
                                <div class="col-lg-9">
                                    <div class="iconic-input right">
                                        {!! Form::text('mco_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                    @if ($errors->has('mco_nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mco_nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" id="enviar" value="Guardar" class="btn btn-primary"/>
                                    <a class="btn btn-primary" href='{{URL::to('/modcontacto/create')}}'>Cancelar</a>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                    @include('partials.modcontacto_listado')
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
        $('#confirmDeletemodalidadcont').on('show.bs.modal', function (e) {

            var mco_codigo = $(e.relatedTarget).data('mco_codigo');
            var mco_nombre = $(e.relatedTarget).data('mco_nombre');


            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar la Modalidad de Contacto ' + mco_nombre + ' ?')
            modal.find('.modal-body .mco_codigo input').val(mco_codigo)
            modal.find('.modal-body .mco_nombre input').val(mco_nombre)

        });
    </script>
@endsection
