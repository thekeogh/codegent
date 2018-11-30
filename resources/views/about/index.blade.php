@extends('layouts.www')
@section('title', 'Codegent\'s mission &amp; founding team')
@section('description', 'Who we are, what we do &amp; why we do it')
@section('image', cdn('img/og/home.jpg'))
@section('body_class', 'About')

@section('main')

    <div class="Main">
        <div class="Spotlight"><div class="Wrapper">
            <h1 class="H1">At Codegent we love the fact that digital technology can change lives. It has the power to make us more productive, better connected, happier, richer and wiser. And we've pulled together a fantastic team of people who share this excitement.</h1>
        </div></div>
        <a href="#founders" class="Spotlight__more Anchor">
            <span class="Spotlight__caption">Our founders</span>
            <i class="material-icons">expand_more</i>
        </a>
    </div>
    <div class="Sub" id="founders"><div class="Wrapper">
        
        <ul class="Founders" style="justify-content: center">
            <li class="Founders__founder">
                <img src="{{ cdn('img/faces/mark.jpg') }}" alt="Mark McDermott" title="Mark McDermott" class="Founders__image">
                <h2 class="Founders__name">Mark McDermott</h2>
                <p class="Founders__socials">
                    <a href="https://www.twitter.com/mr_mcd" class="Founders__social" target="_blank" title="Mark's Twitter"><i class="socicon-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/mhmcdermott" class="Founders__social" target="_blank" title="Mark's LinkedIn"><i class="socicon-linkedin"></i></a>
                </p>
            </li>
            <li class="Founders__founder">
                <img src="{{ cdn('img/faces/david.jpg') }}" alt="David Hart" title="David Hart" class="Founders__image">
                <h2 class="Founders__name">David Hart</h2>
                <p class="Founders__socials">
                    <a href="https://www.twitter.com/davidhart" class="Founders__social" target="_blank" title="David's Twitter"><i class="socicon-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/davidhartcodegent" class="Founders__social" target="_blank" title="David's LinkedIn"><i class="socicon-linkedin"></i></a>
                </p>
            </li>
            {{-- <li class="Founders__founder">
                <img src="{{ cdn('img/faces/luke.jpg') }}" alt="Luke Hubbard" title="Luke Hubbard" class="Founders__image">
                <h2 class="Founders__name">Luke Hubbard</h2>
                <p class="Founders__socials">
                    <a href="https://www.twitter.com/lukeinth" class="Founders__social" target="_blank" title="Luke's Twitter"><i class="socicon-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/luke-hubbard-857b189b" class="Founders__social" target="_blank" title="Luke's LinkedIn"><i class="socicon-linkedin"></i></a>
                </p>
            </li> --}}
        </ul>
        
    </div></div>
    
@endsection