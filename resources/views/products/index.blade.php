@extends('layouts.www')
@section('title', 'Digital products, joint ventures, mobile apps &amp; SaaS startups')
@section('description', 'We are a digital product studio based in Old Street London. We\'ve built startups such as ScreenCloud &amp; Tepilo. We own digital UX/UI agency Thin Martian')
@section('image', cdn('img/og/products.jpg'))
@section('body_class', 'Products')

@section('main')
    
    <div class="Main Main--paddless">
        <div class="Spotlight Spotlight--block">
            <div class="CarouselProducts">
                <div class="CarouselProducts__slide CarouselProducts__slide--screencloud">
                    <h1 class="CarouselProducts__logo" title="ScreenCloud">ScreenCloud</h1>
                    <a href="https://screen.cloud" class="Button Button--box" target="_blank">visit website</a>
                </div>
                <div class="CarouselProducts__slide CarouselProducts__slide--tepilo">
                    <h1 class="CarouselProducts__logo" title="Tepilo">Tepilo</h1>
                    <a href="https://tepilo.com" class="Button Button--box" target="_blank">visit website</a>
                </div>
                <div class="CarouselProducts__slide CarouselProducts__slide--twilert">
                    <h1 class="CarouselProducts__logo" title="Twilert">Twilert</h1>
                    <a href="https://twilert.com" class="Button Button--box" target="_blank">visit website</a>
                </div>
            </div>
        </div>
        <a href="#roles" class="Spotlight__more Anchor">
            <span class="Spotlight__caption">Product role</span>
            <i class="material-icons">expand_more</i>
        </a>
    </div>
    <div class="Sub Roles" id="roles"><div class="Wrapper">
        <h2 class="Roles__strap">We've developed multiple B2B &amp; B2C digital product brands in SaaS &amp; Mobile</h2>
        
        @include('components.product', [
            'name' => 'ScreenCloud',
            'image' => 'screencloud.png',
            'url' => 'https://screen.cloud',
            'state' => 'Active - Investment Raised',
            'description' => 'There are many businesses who are not taking advantage of screens because digital signage software is too complicated and expensive. ScreenCloud makes it super simple for a business to turn any screen into a digital sign using consumer hardware.'
        ])
        @include('components.product', [
            'name' => 'Tepilo',
            'image' => 'tepilo.png',
            'url' => 'https://www.tepilo.com',
            'state' => 'Active - Investment Raised',
            'description' => 'Tepilo is an Online-only Estate Agency (OEA), which we co-founded with TV\'s Sarah Beeny. It advertises homes on Rightmove and Zoopla and provides estate agency services from a single call-centre and automates the process of uploading property, setting viewing appointments, making offers and collating documentation for conveyancing.'
        ])
        @include('components.product', [
            'name' => 'Twilert',
            'image' => 'twilert-2013.png',
            'url' => 'https://www.twilert.com',
            'state' => 'Active - Bootstrapped',
            'description' => 'Twilert is a subscription-based Twitter monitoring tool that helps businesses keep an eye on their mentions, hashtags and manage their online reputation. As well as (near) real-time results, Twilert also provides an archiving feature and the ability to define results by location by drawing an area on a map.'
        ])
        @include('components.product', [
            'name' => 'Kizzu',
            'image' => 'kizzu.png',
            'url' => 'http://www.kizzuapps.com',
            'state' => 'Sold to <a href="http://www.bigcleverlearning.com/" target="_blank">Big Clever Learning</a>',
            'description' => 'Our fun and educational apps brand for babies, toddlers and young children. We have a wealth of insight about how youngsters learn online and the result is the highly successful Kizzu suite of mobile apps.'
        ])
        @include('components.product', [
            'name' => 'Learn',
            'image' => 'learn.png',
            'url' => 'https://www.learnapps.co',
            'state' => 'Active - Bootstrapped',
            'description' => 'Our very first mobile app was called Learn Thai and started the language phrasebook range of apps. We’ve evolved the product several times since then and rolled it out across 14 different languages.'
        ])
        @include('components.product', [
            'name' => 'Flow',
            'image' => 'theflowapp.png',
            'url' => 'https://www.youtube.com/watch?v=rhD6WiLAJ9o?rel=0&controls=0&showinfo=0',
            'visit' => 'see video',
            'state' => 'No longer active',
            'description' => 'Instagram has no dedicated iPad app despite the fact that many people enjoy skimming photos on the tablet. We set out to fix that with Flow. Our launch was well received by the tech press, we\'ve been featured by Apple and we continue to add several thousand new users per day.'
        ])
        @include('components.product', [
            'name' => 'Moovrs',
            'image' => 'moovrs.png',
            'url' => 'https://www.youtube.com/watch?v=W-up1Fxo3KU?rel=0&controls=0&showinfo=0',
            'visit' => 'see video',
            'state' => 'No longer active',
            'description' => 'Moovrs is a free iOS mobile app that put\'s the fun back into your property search. Delicately combining entertainment and practicality, Moovrs focuses on the 3 P\'s - Place, Price and Pictures.'
        ])
        @include('components.product', [
            'name' => 'Webcam Snapper',
            'image' => 'snapper.png',
            'url' => 'http://www.webcamsnapper.com/',
            'state' => 'Maintained',
            'description' => 'Webcam snapper is a neat way for developers to instantly allow their visitors to capture pictures and videos from their webcams. It is used by companies such as AirBnB, DailyBooth and Brizzly.'
        ])
        @include('components.product', [
            'name' => 'Schedule',
            'image' => 'schedule.png',
            'url' => 'https://www.scheduleapp.com/',
            'state' => 'Maintained',
            'description' => 'When we wanted a really simple resource scheduling tool, we couldn’t find one without a load of extra bells and whistles that we didn’t need. So we built our own. Turns out, other people liked our simple approach and so we made it available as a service.'
        ])
        @include('components.product', [
            'name' => 'Red5',
            'image' => 'red5.png',
            'url' => 'http://www.red5.org/',
            'state' => 'No longer involved',
            'description' => 'Back in 2005 we helped pioneer one of the first, and most successful, Open Source Flash Projects. Red5 is a Flash Media Server that helps deliver a powerful video streaming and multi-user solution to projects. It even powered Facebook’s self-record video feature!'
        ])
        
    </div></div>
        
@endsection