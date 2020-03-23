<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel"><i class="icon-table"></i>Archivos Adjuntos del Contacto</h4>
            </div>

            <div class="modal-body with-padding">
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Prospecto</th>
                        <th>Fecha</th>
                        <th>Contacto</th>
                        <th>Tipo Archivo</th>
                        <th>Nombre Archivo</th>
                        <th>Ver</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($adjuntos as $key=>$item)
                        <tr>
                            <td align="center">1</td>
                            <td align="center">{{$item->cpc_prospecto}}</td>
                            <td align="center">{{$item->cpc_fecha}}</td>
                            <td align="center">{{$item->cpc_codigo}}</td>
                            <td align="center">{{$item->cpc_tipoarc}}</td>
                            <td align="center"><span class="label label-info">{{$item->cpc_adjunto}}</span></td>
                            <td width="5%" align="center">
                                @if($item->cpc_adjunto)
                                    <a class='btn btn-xs btn-success' href='{{URL::to('/Storage/'.$item->cpc_adjunto)}}' target='_blank'><span class='fa fa-search' aria-hidden='true'></span></a>
                                @else
                                    <button type='button' class='btn btn-xs btn-default'><span class='fa fa-search' aria-hidden='true'></span></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>
<!-- /modal -->
