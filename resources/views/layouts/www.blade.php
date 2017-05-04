<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'London digital product &amp; startup studio : UX/UI interface agency')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('description', 'We are a digital product studio based in Old Street London. We\'ve built startups such as ScreenCloud &amp; Tepilo. We own digital UX/UI agency Thin Martian')">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">

    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:site_name" content="Codegent">
    <meta property="og:title" content="@yield('title', 'London digital product &amp; startup studio : UX/UI interface agency')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="@yield('description', 'We are a digital product studio based in Old Street London. We\'ve built startups such as ScreenCloud &amp; Tepilo. We own digital UX/UI agency Thin Martian')">
    <meta property="og:image" content="@yield('image', cdn('img/og/home.jpg'))">

    <link rel="canonical" href="https://www.codegent.com{{ request()->server('REQUEST_URI') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,300i,500,500i" rel="stylesheet">
    <link rel="icon" href="{{ cdn('favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>

    {{-- Main --}}
    @yield('main')
    
    <script src="{{ mix('/js/app.js') }}"></script>    
</body>
</html>