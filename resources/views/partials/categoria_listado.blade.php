<div class="col-lg-1"></div>
<div class="col-lg-7">
    <h3 class="form-section">Listado de Categorías</h3>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Abreviación</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $cate)
            @if($cate->cate_eliminado == 0)
            <tr>
                <td>{{$cate->cate_codigo}}</td>
                <td>{{$cate->cate_nombre}}</td>
                <td>{{$cate->cate_abrevia}}</td>
                <td align="center">
                    <a href="{{route('categoria.edit',$cate->cate_codigo)}}" class="btn btn-xs btn-warning"><span
                                class="fa fa-pencil" aria-hidden="true"></span></a>
                </td>
                @if($editMode == 0)
                    <td align="center">
                        <button type="button" data-cate_codigo="{!! $cate->cate_codigo !!}"
                                data-cate_nombre="{!! $cate->cate_nombre !!}"
                                data-cate_abrevia="{!! $cate->cate_abrevia !!}"
                                class="btn btn-xs btn-danger btn-flat" data-toggle="modal"
                                data-target="#confirmDeletecate">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                @else
                    <td align="center">
                        <button type="button" data-cate_codigo="{!! $cate->cate_codigo !!}" data-cate_nombre="{!! $cate->cate_nombre !!}"
                                data-cate_abrevia="{!! $cate->cate_abrevia !!}"
                                class="btn btn-xs btn-danger btn-flat" data-toggle="modal" data-target="" disabled>
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

<div class="modal fade" id="confirmDeletecate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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

                        <div class="cate_codigo">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Nombre:</label>

                        <div class="cate_nombre">
                            <input type="text" class="form-control" id="recipient-name" readonly="readonly">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Abreviación:</label>

                        <div class="cate_abrevia">
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