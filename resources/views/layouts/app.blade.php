<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>




    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #1b396a;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('images/IT.PNG')}}" alt="" width="100" height="100">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    @if (Auth::check())





                    <ul class="navbar-nav mr-auto"  >






                    <a class="nav-link" style="color:#F0F3F4;"  href="{{ route('puestos.index') }}">{{ __('Puestos') }}</a>


                        <a class="nav-link" style="color:#F0F3F4;" href="{{ route('docentes.index') }}">{{ __('Docentes') }}</a>
                        <a class="nav-link" style="color:#F0F3F4;" href="{{ route('reuniones.index') }}">{{ __('Reunion Academia') }}</a>
                        <!-- <a class="nav-link" href="{{ route('carreras.index') }}">{{ __('Carreras') }}</a> -->
                        <a class="nav-link" style="color:#F0F3F4;" href="{{ route('tecnologicos.index') }}">{{ __('Tecnologicos') }}</a>
                        <a class="nav-link" style="color:#F0F3F4;" href="{{ route('materias.index') }}">{{ __('Materias') }}</a>
                        <!-- <a class="nav-link" href="{{ route('materiacursadas.index') }}">{{ __('Materias cursadas') }}</a> -->

                        <a class="nav-link" style="color:#F0F3F4;" href="{{ route('plan-estudios.index') }}">{{ __('Planes de estudio') }}</a>
                        <a class="nav-link" style="color:#F0F3F4;" href="{{ route('convalidaciones.index') }}">{{ __('Convalidación') }}</a>

                        <a class="nav-link" style="color:#F0F3F4;" href="{{ route('liberacions.index') }}">{{ __('Liberación Ac') }}</a>


                        <a class="nav-link" style="color:#F0F3F4;" href="{{ route('proyectos.index') }}">{{ __('Proyectos Residencia') }}</a>

                        <!--<a class="nav-link" href="{{ URL::to('/liberacion') }}">{{ __('Liberación Act.') }}</a>
                        -->











                    </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mx-auto">
                        <!-- Authentication Links -->



                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" style="color:#F0F3F4;" href="{{ route('login') }}">{{ __('Acceso') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="color:#F0F3F4;" href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown"  style="color:#F0F3F4;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <img src="{{asset('images/TB.png')}}" alt="" width="150" height="70">
                    </ul>


                </div>

            </div>
        </nav>

<!--

        <div   style="width:100%" height="55">
            <table style="border: 1px solid black;  width: 100%; height: 70px;  border-collapse: collapse; cellpadding: 10px;">
            <tr style="border: hidden" margin: 200px align='center'>
                <td  WIDTH="300">

                    <div   >
                        <img src="https://www.voaxaca.tecnm.mx/wp-content/uploads/2020/05/itvo.ico" width="55" height="55">
                    </div>
                </td>

                <div>
                <td  WIDTH="300" >

                    <div  align='center' >
                        <img src="https://trello-attachments.s3.amazonaws.com/60d78c2fba08028e7ded9685/143x144/b71e1ec458ba74cacd37f8cbadb4ab3d/infor.jpg" width="55" height="55">
                    </div>
                </td>
                </div>
            </tr>


            </table>
        </div>

-->


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
