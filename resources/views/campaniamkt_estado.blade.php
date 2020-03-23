@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">


                <header class="panel-heading" style="height: 60px;">
                    Campaña MKT - Resultados
                            <span class="tools pull-right">
                                <button type="button" class="btn btn-block btn-default" id="refreshButton"><i class="icon wb-refresh" aria-hidden="true"></i> Actualizar Listado</button>
                             </span>
                </header>

                <div class="panel-body">

                    <div class="adv-table">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-hover table-condensed" width="100%"
                                   id="campaniaexp">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Conces</th>
                                    <th>Campaña MKT</th>
                                    <th>Cantidad</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
@section('scripts')


    <script>
        $(document).ready(function () {
            $('#campaniaexp').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "campaniamkt_resultado",
                "columns": [
                    {data: 'fecha'},
                    {data: 'conces'},
                    {data: 'campaniamkt'},
                    {data: 'cantidad'}
                ],
                "order": [0, 'desc'],
                language: {
                    search: "Buscar:",
                    paginate: {
                        previous: 'Anterior',
                        next: 'Siguiente'
                    },
                    zeroRecords: 'No hay registros para mostrar',
                    lengthMenu: 'Ver _MENU_ registros',
                    "info": "Filtrado de _START_ a _END_ - Se encontro _TOTAL_ registros."
                }
            });

            $("#refreshButton").click(function() {
                $('#campaniaexp').DataTable().ajax.reload();
            });

            $.fn.dataTable.ext.errMode = 'throw';
        });
    </script>
@endsection
