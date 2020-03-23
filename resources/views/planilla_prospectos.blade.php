@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Planilla Prospecto
                </header>

                <div class="panel-body">

                    <div class="adv-table">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-hover table-condensed" width="100%"
                                   id="clicon">
                                <thead>
                                <tr>
                                    <th>Cod</th>
                                    <th>Fecha</th>
                                    <th>Empresa</th>
                                    <th>Usuario</th>
                                    <th>Producto</th>
                                    <th>Estado</th>
                                    <th>Vendedor</th>
                                    <th>Fecha Cierre</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    @include('partials.modal_exitos')
@endsection
@section('scripts')
    @if(Session::get('alert'))
        <script>
            $('#modal_alertas').modal('show');
        </script>
    @elseif(Session::get('success'))
        <script>
            $('#modal_exitos').modal('show');
        </script>
    @endif


    <script>
        $(document).ready(function () {
            $('#clicon').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "prospectos_data",
                "columns": [
                    {data: 'pro_codigo'},
                    {data: 'fecha'},
                    {data: 'con_nombre'},
                    {data: 'coc_usuario'},
                    {data: 'Producto'},
                    {data: 'epr_nombre'},
                    {data: 'ven_nombre'},
                    {data: 'FechaCierre'},
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            if (row.epr_nombre == 'Cierre Negativo' || row.epr_nombre == 'Cierre Positivo Implementado y Encuestado') {
                                var a = '<button class="btn btn-xs btn-default"><span class="fa fa-plus" aria-hidden="true"></span></button>';
                                return a;
                            } else {
                                var a = '<a class="btn btn-xs btn-warning" href="form/' + row.pro_codigo + '/edit"><span class="fa fa-plus" aria-hidden="true"></span></a>';
                                return a;
                            }
                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            var a = '<a class="btn btn-xs btn-success" href="form/' + row.pro_codigo + '"><span class="fa fa-search" aria-hidden="true"></span></a>';
                            return a;
                        }
                    },
                ],
                "columnDefs": [
                    {"orderable": false, "targets": [8, 9]}
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

            $.fn.dataTable.ext.errMode = 'throw';
        });
    </script>
@endsection
