<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Permite colocar el icono -->
    <link rel="icon" type="image/png" href="/img/SDV_icono.png" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/estiloEtapas.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    @yield("estiloPersonalisado")

</head>
<body>
    <div class="visible-xs" id="xs-check"></div>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Auth::guest())
                    <a class="navbar-brand" href="{{ url('/') }}">                        
                        {{ config('app.name', 'SDV') }}
                    </a>
                    @else
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <span>{{ config('app.name', 'SDV') }} </span>
                        <!--<img  class="img-responsive" border="0" alt="SDV" src="/img/SDV_icono.png" width="35">-->
                    </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::check())
                    <ul class="nav navbar-nav menu-celular hidden-sm hidden-md hidden-lg ">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-folder-close"></span> Usuarios <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/register') }}"><span class="glyphicon glyphicon-plus-sign text-success"></span> Nuevo usuario</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/usuario') }}"><span class="glyphicon glyphicon-tasks text-primary"></span> Usuarios registrados</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th"></span> Proyectos <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('proyecto.create') }}"><span class="glyphicon glyphicon-plus-sign text-success"></span> Crear proyecto</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('proyecto.index') }}"><span class="glyphicon glyphicon-list text-primary"></span> Mis proyectos </a>
                                    </li>                                    
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Actividades <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('actividad.ver') }}"><span class="glyphicon glyphicon-check text-success"></span> Actividades asignadas  </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('actividad.all') }}"><span class="glyphicon glyphicon-list text-primary"></span> Listar actividades</a>
                                    </li>
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-file"></span> Reportes <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('reporte.trabajador') }}"><span class="glyphicon glyphicon-tasks"></span> Reporte por trabajador</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('reporte.actividad') }}"><span class="glyphicon glyphicon-print text-primary"></span> Reporte avance actividades</a>
                                    </li>
                                </ul>
                        </li>
                    </ul>
                    @endif


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                            <!-- <li><a href="{{ route('register') }}">Registrarse</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->full_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('usuario.show') }}">Mi cuenta</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{ asset('js/miScript.js') }}"></script>
    <script src="{{ asset('js/evaluaciones.js') }}"></script>
    @yield("scriptPersonalisado")
</body>
</html>
