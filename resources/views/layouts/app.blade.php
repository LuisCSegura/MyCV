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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}">
</head>

<body>
    <div id="app">

        <!-- Authentication Links -->
        @guest
        <nav class="navbar navbar-expand-md navbar-light bg-white ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    MyCV
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @else

        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="" id="sidebar-wrapper">

                <div class="sidebar-heading">

                    <!-- <img id="usrImg" src="">-->
                    <br>
                </div>
                <br>
                <br>
                <div class="list-group list-group-flush">
                    <a href="{{route('home')}}" class="list-group-item"> ◉ CREATE</a>
                    <a href="{{route('profiles.index')}}" class="list-group-item"> ◉ PROFILE</a>
                    <a href="{{route('experiences.index')}}" class="list-group-item"> ◉ EXPERIENCE</a>
                    <a href="{{route('educations.index')}}" class="list-group-item"> ◉ EDUCATION</a>
                    <a href="{{route('skills.index')}}" class="list-group-item"> ◉ SKILLS</a>
                    <a href="{{route('knowledges.index')}}" class="list-group-item"> ◉ KNOWLEDGE</a>
                    <a href="{{route('projects.index')}}" class="list-group-item"> ◉ PROJECTS</a>
                    <a href="{{route('hobbies.index')}}" class="list-group-item"> ◉ HOBBIES</a>
                    <a href="{{route('contributions.index')}}" class="list-group-item"> ◉ CONTRIBUTIONS</a>
                </div>
            </div>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                MyCV
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    @endguest




                    <main class="py-4">
                        @yield('content')
                    </main>


                    @guest
                </div>
            </div>
        </div>
        @endguest
    </div>
</body>

</html>