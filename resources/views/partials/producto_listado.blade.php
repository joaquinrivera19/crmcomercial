<div class="col-lg-1"></div>
<div class="col-lg-7">
    <h3 class="form-section">Listado Productos</h3>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Clase Producto</th>
            <th>Nombre</th>
            <th>Tipo Producto</th>
            <th>Abreviación</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $prod)
            @if($prod->prod_eliminado == 0)
                <tr>
                    <td>{{$prod->prod_codigo}}</td>
                    <td>{{$prod->clasesProducto->cp_Nombre}}</td>
                    <td>{{$prod->prod_nombre}}</td>
                    <td>{{$prod->prod_tipo}}</td>
                    <td>{{$prod->prod_abrevia}}</td>
                        <td align="center">
                            <a href="{{route('producto.edit',$prod->prod_codigo)}}" class="btn btn-xs btn-warning"><span
                                        class="fa fa-pencil" aria-hidden="true"></span></a>
                        </td>
                    @if($editMode == 0)
                        <td align="center">
                            <button type="button" data-producto_id="{!! $prod->prod_codigo !!}"
                                    data-producto_clasprod="{!! $prod->prod_clasprod !!}"
                                    data-producto_name="{!! $prod->prod_nombre !!}"
                                    data-producto_tipo="{!! $prod->prod_tipo !!}"
                                    class="btn btn-xs btn-danger btn-flat" data-toggle="modal"
                                    data-target="#confirmDeleteprod">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    @else
                        <td align="center">
                            <button type="button" data-producto_id="{!! $prod->prod_codigo !!}"
                                    data-producto_clasprod="{!! $prod->prod_clasprod !!}"
                                    data-producto_name="{!! $prod->prod_nombre !!}"
                                    data-producto_tipo="{!! $prod->prod_tipo !!}"
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

<div class="modal fade" id="confirmDeleteprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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

                        <div class="produ_codigo">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nombre:</label>

                        <div class="produ_nombre">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Tipo Producto:</label>

                        <div class="produ_tipo">
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