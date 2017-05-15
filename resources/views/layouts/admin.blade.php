<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Codegent CMS')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="canonical" href="https://www.codegent.com{{ request()->server('REQUEST_URI') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,200i,300,300i,500,500i|Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ cdn('favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="Admin @yield('body_class')">
    
    @section('header')
        <header class="AdminHeader">
            <a href="/admin" class="Logo Logo--small">Codegent CMS</a>
            <nav class="AdminNav">
                <a href="{{ route('redirects.index') }}" class="AdminNav__item AdminNav__item--redirects LinkWhite">Redirects</a>
                <a href="#" class="AdminNav__item AdminNav__item--blogcats LinkWhite">Blog Categories</a>
                <a href="#" class="AdminNav__item AdminNav__item--blogarticles LinkWhite">Blog Articles</a>
                <a href="#" class="AdminNav__item AdminNav__item--media LinkWhite">Media</a>
                <a href="{{ route('logout') }}" class="LinkWhite AdminNav__item AdminNav__item--sep" title="Logout"><i class="material-icons">power_settings_news</i></a>
            </nav>
        </header>
    @show
    
    <main class="AdminMain">
        @yield('main')
    </main>
    
    @section('footer')
        <footer class="AdminFooter"></footer>
    @show

</body>
</html>




{{-- <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div> --}}