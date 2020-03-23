@extends('layouts.app')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="col-lg-12">
            <div class="panel panel-primary">


                <header class="panel-heading" style="height: 60px;">
                    Resultados AuditServidor
                            <span class="tools pull-right">
                                <button type="button" class="btn btn-block btn-default" id="refreshButton"><i class="icon wb-refresh" aria-hidden="true"></i> Actualizar Listado</button>
                             </span>
                </header>

                <div class="panel-body">

                    <div class="adv-table">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-hover table-condensed" style="text-align: center;" width="100%"
                                   id="campaniaexp">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">Empresa</th>
                                    <th style="text-align: center;">Domingo</th>
                                    <th style="text-align: center;">Lunes</th>
                                    <th style="text-align: center;">Martes</th>
                                    <th style="text-align: center;">Miercoles</th>
                                    <th style="text-align: center;">Jueves</th>
                                    <th style="text-align: center;">Viernes</th>
                                    <th style="text-align: center;">Sábado</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Centro Motors</td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ramonda Motors</td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Yacopini Motors</td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection