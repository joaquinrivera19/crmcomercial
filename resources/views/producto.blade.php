@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    ABM Producto
                </header>

                <div class="panel-body">
                    <div class="col-lg-4">
                        {!! Form::open(array('url' => 'producto','method' => 'post')) !!}
                        {{--<form class="form-horizontal" role="form">--}}
                        <h3 class="form-section">Cargar Nuevo Producto</h3>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('prod_codigo', 'Código:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    <div class="iconic-input">
                                        {!! Form::text('prod_codigo', null, ['class' => 'form-control','placeholder' => 'Código','readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('prod_clasprod') ? ' has-error' : '' }}">
                                {!! Form::label('prod_clasprod', 'Clase Producto:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    <div class="iconic-input right">
                                        {!! Form::select('prod_clasprod', $clasesproducto,null, ['class' => 'form-control']) !!}
                                    </div>
                                    @if ($errors->has('prod_clasprod'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('prod_clasprod') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('prod_nombre') ? ' has-error' : '' }}">
                                {!! Form::label('prod_nombre', 'Nombre:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    <div class="iconic-input right">
                                        {!! Form::text('prod_nombre', null, ['class' => 'form-control','placeholder' => 'Nombre']) !!}
                                    </div>
                                    @if ($errors->has('prod_nombre'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('prod_nombre') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('prod_tipo') ? ' has-error' : '' }}">
                                {!! Form::label('prod_tipo', 'Tipo Producto:', ['class' => 'control-label col-md-4']) !!}

                                <div class="col-lg-8">
                                    <div class="iconic-input right">
                                        {!! Form::select('prod_tipo', array('ADL' => 'ADL', 'ADS' => 'ADS', 'CNS' => 'CNS'),null, ['class' => 'form-control']) !!}
                                    </div>
                                    @if ($errors->has('prod_tipo'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('prod_tipo') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group{{ $errors->has('prod_abrevia') ? ' has-error' : '' }}">
                                {!! Form::label('prod_abrevia', 'Abreviación:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    <div class="iconic-input right">
                                        {!! Form::text('prod_abrevia', null, ['class' => 'form-control','placeholder' => 'Abreviación']) !!}
                                    </div>
                                    @if ($errors->has('prod_abrevia'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('prod_abrevia') }}</strong>
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
                    @include('partials.producto_listado')
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
        $('#confirmDeleteprod').on('show.bs.modal', function (e) {

            var productoId = $(e.relatedTarget).data('producto_id');
            var productoClasprod = $(e.relatedTarget).data('producto_clasprod');
            var productoNombre = $(e.relatedTarget).data('producto_name');
            var productoTipo = $(e.relatedTarget).data('producto_tipo');

            var modal = $(this);
            modal.find('.modal-title').text('Seguro que desea eliminar el producto ' + productoNombre + ' ?')
            modal.find('.modal-body .produ_codigo input').val(productoId)
            modal.find('.modal-body .produ_clasprod input').val(productoClasprod)
            modal.find('.modal-body .produ_nombre input').val(productoNombre)
            modal.find('.modal-body .produ_tipo input').val(productoTipo)

            $("#delForm").attr('action', productoId);

        });
    </script>
@endsection