<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ozaru') | Mesa de ayuda</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset("assets/bootstrap/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/font-awesome/css/font-awesome.min.css")}}">
    {{-- El custom css apunta a la clae requerido, muestra * a las cassillas que serán requeridas --}}
    @yield("styles")
    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/toastr/toastr.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-select/bootstrap-select.min.css")}}">


</head>

<body>
    <div class="content">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <b>Ozaru</b>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->




                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>

                            @else

                            @include("layouts/aside")
                            {{-- CAMPANA DE NOTIFICACIONES --}}
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-bell"></i>

                                            @if (auth()->user()->unreadNotifications->count()==0)
                                            <span class="badge badge-info">0</span>
                                            @else
                                            <span class="badge badge-info">{{auth()->user()->unreadNotifications->count()}}</span>
                                            @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            @if (auth()->user()->unreadNotifications->count() ==0)
                                            <a class="dropdown-item" href="{{route('markRead')}}" style="color:green">
                                                    No tienes nuevas notificaciones
                                            </a>
                                            @else
                                            <a class="dropdown-item" href="{{route('markRead')}}" style="color:green">
                                                    Marcar todo como leído
                                                </a>
                                            @endif



                                        @foreach (auth()->user()->unreadNotifications as $notification)

                                        <a class="dropdown-item" href="#" >
                                                {{$notification->data['data']}}
                                            </a>
                                        @endforeach



                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                        <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ url('personal-data') }}">
                                                    Datos Personales
                                                </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container">
                    <div class=”col-lg-3 col-md-4 col-sm-6 col-xs-12″></div>
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <!-- jQuery 3 -->
    <script type="text/javascript" src="{{asset("assets/js/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap v4.3.1  -->
    <script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
    {{-- yiel solo para paginas que lo requieran --}}
    @yield('scriptsPlugins')
    <script type="text/javascript" src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
    <script src="{{asset("assets/js/sweet-alert/sweetalert.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap-select/bootstrap-select.min.js")}}"></script>
    <script src="{{asset("assets/js/toastr/toastr.min.js")}}"></script>
    <script src="{{asset("assets/js/scripts.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/funciones.js")}}"></script>
    @yield("scripts")
</body>
</html>
