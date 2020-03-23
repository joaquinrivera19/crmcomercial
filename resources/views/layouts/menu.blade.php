@if(isset(Auth::user()->ven_codigo))
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/home') }}" style="padding: 10px 15px;">
                    <img src="{{asset('assets/images/logo.png')}}" alt="sorzana">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/agenda') }}">Planilla Agenda <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cargar
                            Prospecto
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Cargar Nuevo Prospecto de:</li>
                            <li><a href="{{ url('/form/create') }}">Consultoría y Sistemas Adicionales</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Cargar Nuevo Prospecto de:</li>
                            <li><a href="{{ url('/form_clipotenciales/create') }}">Clientes Potenciales</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Listado
                            Prospectos
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Listado Prospectos de:</li>
                            <li><a href="{{ url('/prospectos') }}">Consultoría y Sistemas Adicionales</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Listado Prospectos de:</li>
                            <li><a href="{{ url('/prospectos_potenciales') }}">Clientes Potenciales</a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->ven_menu == 1)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ajustes
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            {{--<li class="divider"></li>--}}
                            <li><a href="{{ url('/actividad/create') }}">Actividad</a></li>
                            <li><a href="{{ url('/campania/create') }}">Campaña</a></li>
                            <li><a href="{{ url('/categoria/create') }}">Categorías</a></li>
                            <li><a href="{{ url('/concesconsultoria/create') }}">Empresas Consultoría</a></li>
                            <li><a href="{{ url('/concespotenciales') }}">Empresas Potenciales</a></li>
                            <li><a href="{{ url('/modcontacto/create') }}">Modalidad de Contacto</a></li>
                            <li><a href="{{ url('/producto/create') }}">Productos</a></li>
                            <li><a href="{{ url('/sistemas/create')}}">Sistemas</a></li>
                            <li><a href="{{ url('/tipoorigen/create') }}">Tipo Origen</a></li>
                            <li><a href="{{ url('/vendedor/create') }}">Vendedor</a></li>
                        </ul>
                    </li>
                        @endif

                    <li><a href="{{ url('/campaniamkt/create') }}">Campañas MKT <span class="sr-only">(current)</span></a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a style="color:white;height: 75px" href="{{ url('/login') }}"><span class="glyphicon glyphicon-user"></span> Iniciar Sesión</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                               style="color:white">
                                @if(isset(Auth::user()->ven_foto))
                                    <img src="{{asset('storage/'.Auth::user()->ven_foto)}}" alt=""
                                         style="width:30px; border-radius:3px">
                                @endif
                                {{ Auth::user()->ven_nombre }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/vendedor/'.Auth::user()->ven_codigo.'/edit') }}"><i
                                                class="fa fa-btn fa-user"></i> Editar Perfil</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Cerrar Sesión</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>

            </div>
        </div>
    </div>
</nav>
@endif