@extends('layouts.app')

@section('content')

    <section class="wrapper">
        <!-- page start-->

        <div class="main-content">
            <div class="col-lg-12">

                <div class="panel panel-primary">
                    <header class="panel-heading">
                        Contacto de Seguimiento
                    </header>

                    <div class="panel-body">

                        <div class="square-widget">
                            <div class="widget-container">

                                {!! Form::open(array('route' => ['form_clipotenciales.store', 'method' => 'POST'],  'name' => 'form', 'id' => 'default', 'enctype' =>'multipart/form-data')) !!}
                                {!! Form::hidden('editProsp', 1) !!}
                                {!! Form::hidden('concePotencial', 1) !!}

                                {!! Form::datetime('fechacarga', \Carbon\Carbon::now('America/Argentina/Buenos_Aires')->toDateTimeString(),["style" =>"display: none"]) !!}

                                {!! Form::text('url', URL::to('/'),["style" =>"display: none"]) !!}

                                    <div class="titulo_show">Crear Cliente Potencial</div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_conces', 'Código Empresa:', ['class' => 'control-label col-md-6']) !!}
                                                <div class="col-md-6">
                                                    {!! Form::text('cpp_conces', $sigCod, ['class' => 'form-control','placeholder' => 'Código Empresa','readonly' => 'readonly']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('con_nombre', 'Razon Social:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::text('con_nombre', null, ['class' => 'form-control','placeholder' => 'Razon Social']) !!}
                                                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_codigo', 'Código Prospecto:', ['class' => 'control-label col-md-7']) !!}
                                                <div class="col-md-5">
                                                    {!! Form::text('cpp_codigo', null, ['class' => 'form-control','readonly' => 'readonly','placeholder' => 'Código Prospecto']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_pais', 'Pais:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_pais',$pais, null, ['class' => 'form-control', 'id' => 'select-pais']) !!}

                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_provincia', 'Provincia:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_provincia',$provincia, null, ['class' => 'form-control', 'id' => 'select-provincia']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::text('localidad', null, ['class' => 'form-control','placeholder' => 'Localidad', 'id' => 'localidad']) !!}
                                                    {!! Form::hidden('cpp_codpos1', null, ['id' => 'cpp_codpos1']) !!}
                                                    {!! Form::hidden('cpp_codpos2', null, ['id' => 'cpp_codpos2']) !!}
                                                    <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpp_domicilio', 'Domicilio:', ['class' => 'control-label col-md-2']) !!}
                                                <div class="col-md-10" style="padding-left: 10px;">
                                                    {!! Form::text('cpp_domicilio', null, ['class' => 'form-control','placeholder' => 'Domicilio']) !!}
                                                    <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>

                                    <!--/span-->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_tipomarca', 'Tipo Marca:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_tipomarca', $tipomarca, null, ['class' => 'form-control', 'id'  => 'select-tipo']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_actividad', 'Actividad:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_actividad', $actividad, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_marca', 'Marca:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_marca',$marca, null, ['class' => 'form-control', 'id' => 'select-marca']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/row-->
                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_tiporig', 'Tipo Origen:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_tiporig', $tiporigen,null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_nombreorig', 'Nombre Origen:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::text('cpp_nombreorig', null, ['class' => 'form-control','placeholder' => 'Nombre Origen']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!--/span-->
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpp_telefono', 'Teléfono:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::text('cpp_telefono', null, ['class' => 'form-control','placeholder'=>'Teléfono']) !!}
                                                    <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpp_celular', 'Celular:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::text('cpp_celular', null, ['class' => 'form-control','placeholder'=>'Teléfono']) !!}
                                                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpp_email', 'Email:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-lg-8">
                                                    {!! Form::text('cpp_email', null, ['class' => 'form-control','placeholder'=>'Email']) !!}
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_categemp', 'Cat Empresa:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_categemp', $categemp, null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpp_sophab', 'Sop Habilitado:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_sophab',[1 => 'Habilitado', 2 => 'Baja', 0 => 'Suspendido'],null, ['class' => 'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-left">
                                                {!! Form::label('cpp_vendedor', 'Vendedor:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::select('cpp_vendedor', $vendedor, Auth::user()->ven_codigo, ['class' => 'form-control']) !!}
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('cpc_estado', 'Estado Prospecto:', ['class' => 'control-label col-md-4']) !!}
                                                <div class="col-md-8">
                                                    {!! Form::text('estado','Pendiente de Carga', ['class' => 'form-control', 'disabled' => 'true']) !!}
                                                    {!! Form::hidden('cpc_estado',9) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    {!! Form::textarea('cpp_observa', null, ['class' => 'form-control', 'data-autoresize','rows' => 4,'placeholder' => 'Observaciones']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                <button class="btn btn-wi finish">Guardar</button>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/crm_concespot.js')}}"></script>
    <script src="{{asset('assets/js/jquery.stepy.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>

    <script>
        /*=====STEPY WIZARD====*/
        $(function () {
            $('#default').stepy({
                validate: true
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#localidad").autocomplete({
                source: '{{URL::route('localidades')}}',
                minLength: 1,
                select: function (event, ui) {
                    $('#localidad').val(ui.item.value);
                    $('#cpp_codpos1').val(ui.item.id);
                    $('#cpp_codpos2').val(ui.item.loc_codigo2);

                    $(this).val(ui.item ? ui.item : " ");
                },

                change: function (event, ui) {
                    if (!ui.item) {
                        this.value = '';
                    }
                },

            });
        });

    </script>
@endsection