@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Planilla Agenda
                </header>
                <div class="panel-body">

                    <div class="adv-table">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-hover table-condensed" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Fec Cont Inicial</th>
                                    <th>Fec Prox Cont</th>
                                    <th>Prosp</th>
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>Producto / Actividad</th>
                                    <th>Estado</th>
                                    <th>Prob Cierre</th>
                                    <th>Vendedor</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($agenda as $age)

                                    @if($age->Tipo_Prospecto == 1)
                                        <tr style='background-color: #d1fbe4'>
                                    @else
                                        <tr style='background-color: #EFFBFF'>
                                            @endif
                                            <td class="center">{{date("d/m/Y", strtotime($age->Fecha_Cont_Inicial))}}</td>
                                            <td class="center">

                                                <button type="button" data-act_codigo="{!! $age->Cod_Prospecto !!}"
                                                        data-act_nombre="{!! $age->Nombre_Conces !!}"
                                                        data-act_fecha="{!! $age->Fecha_Prox_Cont !!}"
                                                        data-act_tipopros="{!! $age->Tipo_Prospecto !!}"
                                                        data-act_vende="{!! $age->Vendedor_cod !!}"
                                                        class="btn btn-detail" data-toggle="modal"
                                                        data-target="#confirmMod">
                                                    {{date("d/m/Y", strtotime($age->Fecha_Prox_Cont))}}
                                                </button>

                                            </td>
                                            <td class="center">{{$age->Cod_Prospecto}}</td>
                                            <td class="center hidden-phone"><strong
                                                        class="text-default">{{$age->Nombre_Conces}}</strong></td>
                                            <td class="center">{{$age->Usuario}}</td>
                                            <td class="center hidden-phone">
                                                @if($age->Producto == 'Otros')
                                                    <span class="label label-success label-mini">
                                                    {{$age->Descripcion}}
                                                </span>
                                                @else
                                                    <span class="label label-success label-mini">
                                                    {{$age->Producto}}
                                                </span>
                                                @endif
                                            </td>
                                            <td class="center">{{$age->Estado}}</td>
                                            <td class="center">{{$age->Prob_Cierre}}</td>
                                            <td class="center">{{$age->Vendedor}}</td>
                                            <td align="center">
                                                @if($age->Tipo_Prospecto == 1)
                                                    <a class='btn btn-warning btn-xs'
                                                       href='{{URL::to('/form/'.$age->Cod_Prospecto.'/edit')}}'><span
                                                                class="fa fa-plus" aria-hidden="true"></span></a>
                                                @else
                                                    <a class='btn btn-warning btn-xs'
                                                       href='{{URL::to('/form_clipotenciales/'.$age->Cod_Prospecto.'/edit')}}'><span
                                                                class="fa fa-plus" aria-hidden="true"></span></a>
                                                @endif
                                            </td>

                                            <td align="center">
                                                @if($age->Tipo_Prospecto == 1)
                                                    <a class='btn btn-success btn-xs'
                                                       href='{{URL::to('/form/'.$age->Cod_Prospecto)}}'><span
                                                                class="fa fa-search" aria-hidden="true"></span></a>
                                                @else
                                                    <a class='btn btn-success btn-xs'
                                                       href='{{URL::to('/form_clipotenciales/'.$age->Cod_Prospecto)}}'><span
                                                                class="fa fa-search" aria-hidden="true"></span></a>
                                                @endif
                                            </td>

                                        </tr>
                                        @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="confirmMod" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel"></h4>
                        </div>
                        {!! Form::open(array('url' => 'agenda','method' => 'post')) !!}

                        {!! Form::hidden('hir_estado', 1) !!}
                        {!! Form::hidden('hir_contcod', 1) !!}

                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('hir_proscod', 'Cod Prospecto:', ['class' => 'control-label col-md-3']) !!}
                                    <div class="act_codigo col-md-9">
                                        {!! Form::text('hir_proscod', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="act_tipopros">
                                {!! Form::hidden('hir_tipoprospecto', null) !!}
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('con_nombre', 'Cliente:', ['class' => 'control-label col-md-3']) !!}
                                    <div class="act_nombre col-md-9">
                                        {!! Form::text('cli', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('hir_vendedor', 'Vendedor:', ['class' => 'control-label col-md-3']) !!}
                                    <div class="col-md-9">
                                        {!! Form::select('hir_vendedor', $vendedor, null, ['class' => 'form-control', 'id' => 'act_vende']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('hir_feccar', 'Fecha:', ['class' => 'control-label col-md-3']) !!}
                                    <div class="act_fecha col-md-9">
                                        {{--{!! Form::date('hir_feccar', \Carbon\Carbon::now()->toDateString(), ['class' =>'form-control', 'min' => \Carbon\Carbon::yesterday()->toDateString(), 'max' => \Carbon\Carbon::now()->toDateString()]) !!}--}}
                                        {!! Form::date('hir_feccar', \Carbon\Carbon::now()->toDateString(), ['class' =>'form-control', 'min' => \Carbon\Carbon::yesterday()->toDateString()]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('hir_motivo', 'Motivo:', ['class' => 'control-label col-md-3']) !!}
                                    <div class="cpp_observa col-md-9">
                                        {!! Form::textarea('hir_motivo', null, ['class' => 'form-control','style' => 'resize: none;','rows' => 4,'placeholder' => 'Motivo por el cual deseas modificar la fecha del prospecto']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            {{--<button type="submit" class="btn btn-primary">Guardar Cambios</button>--}}
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>


        </div>

    </section>


@endsection

@section('scripts')


    <script>
        $('#confirmMod').on('show.bs.modal', function (e) {

            var act_id = $(e.relatedTarget).data('act_codigo');
            var act_name = $(e.relatedTarget).data('act_nombre');
            var act_fecha = $(e.relatedTarget).data('act_fecha');
            var act_tipopros = $(e.relatedTarget).data('act_tipopros');
            var act_vende = $(e.relatedTarget).data('act_vende');

            var modal = $(this);
            modal.find('.modal-title').text('Está seguro de que deseas modificar la Fecha del Prospecto ' + act_id + ' ?')
            modal.find('.modal-body .act_codigo input').val(act_id)
            modal.find('.modal-body .act_nombre input').val(act_name)
            modal.find('.modal-body .act_fecha input').val(act_fecha)
            modal.find('.modal-body .act_tipopros input').val(act_tipopros)
            modal.find('.modal-body #act_vende').val(act_vende)

        });
    </script>

@endsection