@extends('layouts.www')
@section('title', 'UX/UI London digital interface agency : Thin Martian')
@section('description', 'Our client services team create UX/UI digital interface design &amp; build projects for clients such as BBC, Microsoft, Nestl&eacute;, Skechers, TimeOut &amp; more')
@section('image', cdn('img/og/agency.jpg'))
@section('body_class', 'Agency')

@section('main')

    <div class="Office">
        <div class="Main"><div class="Wrapper">
            <p class="Office__content">We set up shop in 2004, in a borrowed room in South West London, as a web design agency.</p>
            <p class="Office__content">Our aim was to do great work and be able to react to opportunities as we found them.</p>
        </div></div>
        <a href="#more" class="Spotlight__more Anchor">
            <span class="Spotlight__caption">Thin Martian</span>
            <i class="material-icons">expand_more</i>
        </a>
    </div>
    <div class="Sub Thinmartian" id="more"><div class="Wrapper">
        <div class="Thinmartian__logo"><img src="{{ cdn('img/logos/thin-martian.svg') }}" alt="Thin Martian" title="Thin Martian"></div>
        <p class="Thinmartian__content">In 2012 we acquired digital agency Thin Martian who have been around for even longer than us. We merged the two agency businesses together and now all our client creative services are done under the Thin Martian brand.</p>
        <a href="https://www.thinmartian.com" class="Button Button--box" target="_blank">visit website</a>
    </div></div>
    
@endsection