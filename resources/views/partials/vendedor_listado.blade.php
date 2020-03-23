<div class="col-lg-1"></div>
<div class="col-lg-7">
    <h3 class="form-section">Listado de Vendedores</h3>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Mail</th>
            <th>Estado</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($vendedores as $vende)
            @if($vende->ven_eliminado == 0)
                <tr>
                    <td>{{$vende->ven_codigo}}</td>
                    <td>{{$vende->ven_nombre}}</td>
                    <td>{{$vende->ven_usuario}}</td>
                    <td>{{$vende->ven_email}}</td>
                    <td align="center">
                        @if($vende->ven_estado == 1)
                            <span class="label label-success label-mini">Habilitado</span>
                        @else
                            <span class="label label-danger label-mini">Deshabilitado</span>
                        @endif
                    </td>
                    <td align="center">
                        <a href="{{route('vendedor.edit',$vende->ven_codigo)}}" class="btn btn-xs btn-warning"><span
                                    class="fa fa-pencil" aria-hidden="true"></span></a>
                    </td>
                    @if($editMode == 0)
                        <td align="center">
                            <button type="button" data-ven_codigo="{!! $vende->ven_codigo !!}"
                                    data-ven_nombre="{!! $vende->ven_nombre !!}"
                                    data-ven_usuario="{!! $vende->ven_usuario !!}"
                                    data-ven_email="{!! $vende->ven_email !!}"
                                    data-ven_estado="{!! $vende->ven_estado !!}"
                                    class="btn btn-xs btn-danger btn-flat" data-toggle="modal"
                                    data-target="#confirmDeletevend">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    @else
                        <td align="center">
                            <button type="button" data-ven_codigo="{!! $vende->ven_codigo !!}"
                                    data-ven_nombre="{!! $vende->ven_nombre !!}"
                                    data-ven_usuario="{!! $vende->ven_usuario !!}"
                                    data-ven_email="{!! $vende->ven_email !!}"
                                    data-ven_estado="{!! $vende->ven_estado !!}"
                                    class="btn btn-xs btn-danger btn-flat" data-toggle="modal"
                                    data-target="" disabled>
                                <i class="fa fa-trash" ></i>
                            </button>
                        </td>
                    @endif
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="confirmDeletevend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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

                        <div class="ven_codigo">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nombre:</label>

                        <div class="ven_nombre">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Usuario:</label>

                        <div class="ven_usuario">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Email:</label>

                        <div class="ven_email">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Estado:</label>

                        <div class="ven_estado">
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