<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!--<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">-->
    <link href="{{ asset('/css/app.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/selectize.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/selectize.bootstrap3.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <!--<li><a href="{{ url('/home')}}">Dashboard</a></li> -->
                            {!! Html::smartNav(url('/home'), 'Dashboard') !!}
                            
                        @endif
                        @role('admin')
                        <!-- <li><a href="{{ route('authors.index')}}">Penulis</a></li>
                        <li><a href="{{ route('books.index')}}">Buku</a></li>
                        <li><a href="{{ route('members.index')}}">Member</a></li>
                        <li><a href="{{ route('statistics.index')}}">Peminjaman</a></li> -->
                        {!! Html::smartNav(route('authors.index'), 'Penulis') !!}
                        {!! Html::smartNav(route('books.index'), 'Buku') !!}
                        {!! Html::smartNav(route('members.index'), 'Member') !!}
                        {!! Html::smartNav(route('statistics.index'), 'Peminjaman') !!}
                        @endrole
                        @if (auth()->check())
                            <!--<li><a href="{{ url('/settings/profile') }}">Profil</a></li> -->
                            {!! Html::smartNav(url('/settings/profile'), 'Profil') !!}
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Daftar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/settings/password') }}"><i class="fa fa-btn fa-lock"></i>Ubah Password</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts._flash')
        @yield('content')
    </div>

    <!-- Scripts -->   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/costum.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/selectize.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
