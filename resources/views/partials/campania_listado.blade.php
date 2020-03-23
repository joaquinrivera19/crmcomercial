<div class="col-lg-1"></div>
<div class="col-lg-7">
    <h3 class="form-section">Listado Campañas</h3>
    <table class="table table-hover table-bordered table-condensed">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre Campaña</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Estado</th>
            <th>Abrevia</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($campanias as $camp)
            @if($camp->cam_eliminado == 0)
                <tr>
                    <td>{{$camp->cam_codigo}}</td>
                    <td>{{$camp->cam_nombre}}</td>
                    <td>{{date('d/m/Y',strtotime($camp->cam_fecini))}}</td>
                    <td>{{date('d/m/Y',strtotime($camp->cam_fecfin))}}</td>
                    <td align="center">
                        @if($camp->cam_estado == 1)
                            <span class="label label-success label-mini">Habilitado</span>
                        @else
                            <span class="label label-danger label-mini">Deshabilitado</span>
                        @endif
                    </td>
                    <td>{{$camp->cam_abrevia}}</td>
                    <td align="center">
                        <a href="{{route('campania.edit',$camp->cam_codigo)}}" class="btn btn-xs btn-warning"><span
                                    class="fa fa-pencil" aria-hidden="true"></span></a>
                    </td>
                    @if($editMode == 0)
                        <td align="center">
                            <button type="button" data-camp_id="{!! $camp->cam_codigo !!}"
                                    data-camp_name="{!! $camp->cam_nombre !!}"
                                    data-camp_fecini="{!! $camp->cam_fecini !!}"
                                    data-camp_fecfin="{!! $camp->cam_fecfin !!}"
                                    class="btn btn-xs btn-danger btn-flat" data-toggle="modal"
                                    data-target="#confirmDelete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    @else
                        <td align="center">
                            <button type="button"
                                    class="btn btn-xs btn-danger btn-flat" data-toggle="modal"
                                    data-target="" disabled>
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    @endif
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Id:</label>

                        <div class="camp_codigo">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nombre:</label>

                        <div class="camp_nombre">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Fecha Inicial:</label>

                        <div class="camp_fecini">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Fecha Fin:</label>

                        <div class="camp_fecfin">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                {!! Form::open(['method' => 'DELETE', 'id'=>'delForm']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

