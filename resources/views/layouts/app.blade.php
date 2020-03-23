<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CRM Comercial</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/css.css')}}">

    <!-- Styles-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/datatable/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.stepy.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/highlight.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-switch.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/docs.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/estilos.css')}}">

    <!--file upload-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-fileupload.min.css')}}"/>
    <!--ios7-->
    <link rel="stylesheet" href="{{asset('assets/js/ios-switch/switchery.css')}}"/>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body id="app-layout">

@include('layouts.menu')

@yield('content')

        <!-- JavaScripts-->

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>
<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/highlight.js')}}"></script>

<script>
    $('#dynamic-table').DataTable({
        "ordering": true,
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
</script>


<script>
    $('#dynamic-tableclipotenciales').DataTable({
        "ordering": true,
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
</script>

<script>
    $('#dynamic-tablecli').DataTable({
        "ordering": true,
        "order": [0, 'asc'],
        language: {
            search: "Buscar:",
            paginate: {
                previous: 'Anterior',
                next: 'Siguiente'
            },
            zeroRecords: 'No hay registros para mostrar',
            lengthMenu: 'Ver _MENU_ registros',
            "info": "Filtrado de _START_ a _END_ - Se encontro _TOTAL_ registros."
        },
        "columnDefs": [
            {"orderable": false, "targets": [8, 9]}
        ]
    });
</script>

@yield('scripts')
</body>
</html>
