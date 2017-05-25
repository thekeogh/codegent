@extends('layouts.www')
@section('body_class', 'Thinking Thinking--feed')

@section('title', 'Social media news feed from Codegent')
@section('description', 'Tweets, pictures &amp; posts on digital product design, startup studios, digital entrepreneurship & internet trends')
@section('image', cdn('img/og/thinking.jpg'))

@section('secondary')
    @include('blog._secondary')
@endsection

@section('main')

    <main class="Main Feed">
        <iframe width="100%" height="100%" src="https://www.rebelmouse.com/codegent?embedded=1&skip=show_rebelnav,following,also-on-rm" frameborder="0"></iframe>
    </main>
    
@endsection