<div class="col-lg-1"></div>
<div class="col-lg-7">
    <h3 class="form-section">Listado de Sistemas</h3>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sistemas as $sist)
            @if($sist->sist_eliminado == 0)
                <tr>
                    <td>{{$sist->sist_codigo}}</td>
                    <td>{{$sist->sist_nombre}}</td>
                    <td align="center">
                        <a href="{{route('sistemas.edit',$sist->sist_codigo)}}" class="btn btn-xs btn-warning"><span
                                    class="fa fa-pencil" aria-hidden="true"></span></a>
                    </td>
                    @if($editMode == 0)
                        <td align="center">
                            <button type="button" data-sist_codigo="{!! $sist->sist_codigo !!}"
                                    data-sist_nombre="{!! $sist->sist_nombre !!}"
                                    class="btn btn-xs btn-danger btn-flat" data-toggle="modal"
                                    data-target="#confirmDeletesist">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    @else
                        <td align="center">
                            <button type="button" data-sist_codigo="{!! $sist->sist_codigo !!}"
                                    data-sist_nombre="{!! $sist->sist_nombre !!}"
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

<div class="modal fade" id="confirmDeletesist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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

                        <div class="sist_codigo">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nombre:</label>

                        <div class="sist_nombre">
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