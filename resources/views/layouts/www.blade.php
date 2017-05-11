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
    
    <link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?libdco">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,200i,300,300i,500,500i|Material+Icons" rel="stylesheet">
    <link rel="icon" href="{{ cdn('favicon.png') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    
    <script type="application/ld+json">
        {
            "@context" : "http://schema.org",
            "@type" : "Organization",
            "name" : "Codegent",
            "url" : "http://www.codegent.com",
            "sameAs" : [
                "https://twitter.com/codegent",
                "https://www.facebook.com/codegent",
                "https://www.youtube.com/user/codegent",
                "https://www.linkedin.com/company/228582",
                "https://www.instagram.com/codegent/",
                "https://plus.google.com/+codegent/"
            ]
        }
    </script>
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-240265-2']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
</head>
<body class="@yield('body_class')">
    
    <header class="Header"><div class="Wrapper">
        <a href="{{ route('home') }}"><i class="Logo Logo--small"></i></a>
        <nav class="Primary">
            <a href="#" class="Primary__reveal"><i class="material-icons">menu</i></a>
            <ul class="Primary__items">
                <li class="Primary__item"><a href="{{ route('about') }}" class="Primary__link Primary__link--about">About</a></li>
                <li class="Primary__item"><a href="{{ route('products') }}" class="Primary__link Primary__link--products">Products</a></li>
                <li class="Primary__item"><a href="{{ route('agency') }}" class="Primary__link Primary__link--agency">Agency</a></li>
                <li class="Primary__item Primary__link--thinking">
                    <i class="material-icons Primary__more">add</i>
                    <a href="#" class="Primary__link">Thinking</a>
                    <ul class="Secondary Secondary--hidden">
                        <li class="Secondary__item"><a href="" class="Secondary__link">Blog</a></li>
                        <li class="Secondary__item"><a href="" class="Secondary__link">Feed</a></li>
                    </ul>
                </li>
                <li class="Primary__item"><a href="{{ route('contact') }}" class="Primary__link Primary__link--contact">Contact</a></li>
            </ul>
        </nav>
    </div></header>
    
    {{-- Main --}}
    @yield('main')
    
    <script src="{{ mix('/js/app.js') }}"></script>    
</body>
</html>