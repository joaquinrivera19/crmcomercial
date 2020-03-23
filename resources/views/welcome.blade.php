@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">Bienvenido!</div>

                    <div class="panel-body">
                        <h3 style="text-align: center; border-bottom:1px solid grey">CRM COMERCIAL - Sorzana Software
                            S.A.</h3>
                        <div class="menu-botones col-lg-12">
                            <div class="row">
                                <a href="{{ url('/prospectos') }}">
                                    <div class="menu-control col-lg-2">
                                        <i class="fa fa-list-alt"></i>

                                        <p>Listado Prospectos Consultoría</p>
                                    </div>
                                </a>
                                <a href="{{ url('/agenda') }}">
                                    <div class="menu-control col-lg-2 col-lg-offset-1">
                                        <i class="fa fa-calendar"></i>

                                        <p>Planilla Agenda</p>
                                    </div>
                                </a>
                                <a href="{{ url('/form/create') }}">
                                    <div class="menu-control col-lg-2 col-lg-offset-1">
                                        <i class="fa fa-file-text-o"></i>

                                        <p>Nuevo Prospecto Consultoría</p>
                                    </div>
                                </a>
                                <a href="{{ url('/form_clipotenciales/create') }}">
                                    <div class="menu-control col-lg-2 col-lg-offset-1">
                                        <i class="fa fa-user-plus"></i>

                                        <p>Nuevo Cliente Potencial</p>
                                    </div>
                                </a>

                            </div>
                            <div class="row">
                                <a href="{{ url('/prospectos_potenciales') }}">
                                    <div class="menu-control col-lg-2">
                                        <i class="fa fa-list-alt"></i>

                                        <p>Listado Prospectos Potenciales</p>
                                    </div>
                                </a>

                                @if (Auth::guest())
                                    <a style="color:white;height: 75px" href="{{ url('/login') }}">
                                        <div class="menu-control col-lg-2 col-lg-offset-1">
                                            <i class="fa fa-users"></i>

                                            <p>Perfil de Usuario</p>
                                        </div>
                                    </a>
                                @else
                                    <a href="{{ url('/vendedor/'.Auth::user()->ven_codigo.'/edit') }}">
                                        <div class="menu-control col-lg-2 col-lg-offset-1">
                                            <i class="fa fa-users"></i>

                                            <p>Perfil de Usuario</p>
                                        </div>
                                    </a>
                                @endif
                        </div>
                    </div>
                    {{--<a  href="/usuarios">Usuarios</a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
