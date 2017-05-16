<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Please login') - Codegent CMS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="canonical" href="https://www.codegent.com{{ request()->server('REQUEST_URI') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,200i,300,300i,500,500i|Droid+Sans+Mono|Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ cdn('favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body class="Admin @yield('body_class')">
    
    @section('header')
        <header class="AdminHeader">
            <a href="/" class="Logo Logo--small" target="_blank" title="Visit website">Codegent</a>
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
        
        @if (session()->has('success') or session()->has('error'))
            <aside class="Alert Alert--autohide Alert--{{ session()->has('success') ? 'success' : 'error' }}">
                {{ session()->has('success') ? session()->get('success') : session()->get('error') }}
            </aside>
        @endif
        
        @yield('main')
    </main>
    
    @section('footer')
        <footer class="AdminFooter"></footer>
    @show

    <script src="{{ mix('/js/admin.js') }}"></script>  
</body>
</html>