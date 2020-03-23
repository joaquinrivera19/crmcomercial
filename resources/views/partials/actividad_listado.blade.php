<div class="col-lg-1"></div>
<div class="col-lg-7">
    <h3 class="form-section">Listado de Actividades</h3>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Abreviación</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($actividades as $activi)
            @if($activi->act_eliminado == 0)
                <tr>
                    <td>{{$activi->act_codigo}}</td>
                    <td>{{$activi->act_nombre}}</td>
                    <td>{{$activi->act_abrevia}}</td>
                    <td align="center">
                        <a href="{{route('actividad.edit',$activi->act_codigo)}}" class="btn btn-xs btn-warning"><span
                                    class="fa fa-pencil" aria-hidden="true"></span></a>
                    </td>
                    @if($editMode == 0)
                        <td align="center">
                            <button type="button" data-act_codigo="{!! $activi->act_codigo !!}"
                                    data-act_nombre="{!! $activi->act_nombre !!}" data-act_abrevia="{!! $activi->act_abrevia !!}"
                                    class="btn btn-xs btn-danger btn-flat" data-toggle="modal"
                                    data-target="#confirmDeleteact">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    @else
                        <td align="center">
                            <button type="button" data-act_codigo="{!! $activi->act_codigo !!}"
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

<div class="modal fade" id="confirmDeleteact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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

                        <div class="act_codigo">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nombre:</label>

                        <div class="act_nombre">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Abreviación:</label>

                        <div class="act_abrevia">
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