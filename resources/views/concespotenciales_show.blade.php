@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Contacto de Seguimiento
                </header>

                <div class="panel-body">
                    {!! Form::model($concespotenciales,['method' => 'PATCH','route'=>['concespotenciales.update',$concespotenciales->cpp_codigo]]) !!}

                    <div class="titulo_show">Ver Cliente Potencial</div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_conces', 'Código Empresa:', ['class' => 'control-label col-md-6']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('cpp_conces', null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('con_nombre', 'Razon Social:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('con_nombre', $concespotenciales->cpp_nombre, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_codigo', 'Código Prospecto:', ['class' => 'control-label col-md-7']) !!}
                                <div class="col-md-5">
                                    {!! Form::text('cpp_codigo', null, ['class' => 'form-control','readonly' => 'readonly', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_pais', 'Pais:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::select('cpp_pais',$pais, null, ['class' => 'form-control', 'id' => 'select-pais', 'disabled' => 'disabled']) !!}

                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_provincia', 'Provincia:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::select('cpp_provincia',$provincia, null, ['class' => 'form-control', 'id' => 'select-provincia', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('localidad', 'Localidad:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('localidad', $concespotenciales->cpp_localinombre, ['class' => 'form-control', 'id' => 'localidad', 'disabled' => 'disabled']) !!}
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
                                    {!! Form::text('cpp_domicilio', null, ['class' => 'form-control','placeholder' => 'Domicilio', 'disabled' => 'disabled']) !!}
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
                                    {!! Form::select('cpp_tipomarca', $tipomarca, null, ['class' => 'form-control', 'id'  => 'select-tipo', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_actividad', 'Actividad:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::select('cpp_actividad', $actividad, null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_marca', 'Marca:', ['class' => 'control-label col-md-4']) !!}

                                <div class="col-md-8">
                                    @if($concespotenciales->cpp_tipomarca == 1)
                                        {!! Form::select('cpp_marca',$marca, null, ['class' => 'form-control', 'id' => 'select-marca', 'disabled' => 'disabled']) !!}
                                    @else
                                        {!! Form::text('cpp_marcadetalle', null, ['class' => 'form-control', 'id' => 'input-marca','disabled' => 'disabled']) !!}
                                    @endif
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
                                    {!! Form::select('cpp_tiporig', $tiporigen,null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_nombreorig', 'Nombre Origen:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('cpp_nombreorig', null, ['class' => 'form-control','placeholder' => 'Nombre Origen', 'disabled' => 'disabled']) !!}
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
                                    {!! Form::text('cpp_telefono', null, ['class' => 'form-control','placeholder'=>'Teléfono', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('cpp_celular', 'Celular:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('cpp_celular', null, ['class' => 'form-control','placeholder'=>'Teléfono', 'disabled' => 'disabled']) !!}
                                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('cpp_email', 'Email:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-lg-8">
                                    {!! Form::text('cpp_email', null, ['class' => 'form-control','placeholder'=>'Email', 'disabled' => 'disabled']) !!}
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
                                    {!! Form::select('cpp_categemp', $categemp, null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cpp_sophab', 'Sop Habilitado:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    @if($concespotenciales->cpp_sophab == 0)
                                        {!! Form::text('cpp_sophab','Baja', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    @else
                                        {!! Form::text('cpp_sophab','Habilitado', ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-left">
                                {!! Form::label('cpp_vendedor', 'Vendedor:', ['class' => 'control-label col-md-4']) !!}
                                <div class="col-md-8">
                                    {!! Form::select('cpp_vendedor', $vendedor, Auth::user()->ven_codigo, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
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
                                    @if($concespotenciales->cpc_estado == 9)
                                        {!! Form::text('cpc_estado',$concespotenciales->estado->epr_nombre, ['class' => 'form-control','style' => 'background-color: rgba(146, 56, 56, 0.26);','disabled' => 'disabled']) !!}
                                    @else
                                        {!! Form::text('cpc_estado',$concespotenciales->estado->epr_nombre, ['class' => 'form-control','style' => 'background-color: rgba(63, 144, 62, 0.26);','disabled' => 'disabled']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    {!! Form::textarea('cpp_observa', null, ['class' => 'form-control', 'data-autoresize','rows' => 4,'placeholder' => 'Observaciones', 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->

                    <a class="btn btn-wi finish" href='{{URL::to('/concespotenciales')}}'>Volver</a>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </section>
@endsection
