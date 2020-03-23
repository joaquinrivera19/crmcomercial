@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Planilla Prospectos Potenciales
                </header>

                <div class="panel-body">
                    <div class="pull-right">
                        <div class="btn-group">
                            <a class='btn btn-success' role='button' href='{{URL::to('/concespotenciales/create')}}'><i class='fa fa-plus'></i> Cargar Nuevo Concesionario Potencial</a>
                        </div>
                    </div>
                </div>

                <div class="panel-body">

                    <div class="adv-table">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-hover table-condensed" width="100%"
                                   id="clipot2">
                                <thead>
                                <tr>
                                    <th>Cod</th>
                                    <th>Fecha</th>
                                    <th>Empresa</th>
                                    <th>Contacto</th>
                                    <th>Marca</th>
                                    <th>Actividad</th>
                                    <th>Estado</th>
                                    <th>Vendedor</th>
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
            $('#clipot2').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "prospectos_potenciales_data",
                "columns": [
                    {data: 'cpp_codigo'},
                    {data: 'fecha'},
                    {data: 'cpp_nombre'},
                    {data: 'cpc_usuario'},
                    {data: 'marca'},
                    {data: 'act_nombre'},
                    {data: 'epr_nombre'},
                    {data: 'ven_nombre'},
                    {
                        data: null,
                        render: function (data, type, row, meta) {

                            var a = '<a class="btn btn-xs btn-warning" href="concespotenciales/' + row.cpp_codigo + '/edit"><span class="fa fa-pencil" aria-hidden="true"></span></a>';
                            return a;

                        }
                    },
                    {
                        data: null,
                        render: function (data, type, row, meta) {

                            var a = '<a class="btn btn-xs btn-success" href="concespotenciales/' + row.cpp_codigo + '"><span class="fa fa-search" aria-hidden="true"></span></a>';
                            return a;

                        }
                    }
                ],
                "columnDefs": [
                    {"orderable": false, "targets": [8,9]}
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