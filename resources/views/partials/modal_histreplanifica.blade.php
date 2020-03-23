<!-- modal -->
<div class="modal fade" id="histreplanifica" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="memberModalLabel"><i class="icon-table"></i>Ver Historial de RePlanificación - # {{$modal_empresa->codigo}} - {{$modal_empresa->nombre}}</h4>
            </div>

            <div class="modal-body with-padding">

                <div class="panel panel-default">

                    <table class="table table-hover table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Vendedor</th>
                            <th>Motivo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($histreplanifica as $histre)
                            <tr>
                                <td><span class="label label-success label-mini">{{date("d/m/Y", strtotime($histre->hir_feccar))}}</span></td>
                                <td>{{$histre->vendedor->ven_nombre}}</td>
                                <td>{{$histre->hir_motivo}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>
<!-- /modal -->
