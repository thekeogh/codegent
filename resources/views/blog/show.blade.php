@extends('layouts.www')
@section('body_class', 'Thinking Thinking--blog')

@section('type', 'article')
@section('title', $article->title)
@section('description', $article->summary)
@section('image', $article->image_url)

@section('secondary')
    @include('blog._secondary')
@endsection

@section('main')

    <main class="Main"><div class="Wrapper">
        
        <h1 class="Thinking__title">@yield('title')</h1>
        
        <div class="Blog">
            <div class="Content">
                
                {{-- Author --}}
                <div class="Author">
                    <img src="https://avatars.io/gravatar/{{ $article->admin->email }}" alt="{{ $article->admin->name }}" title="{{ $article->admin->name }}" class="Author__avatar">
                    <div class="Author__details">
                        {{ $article->admin->name }}<br>
                        In
                        @foreach ($article->categories as $count => $category)
                            <a href="{{ route('blog.category', $category->slug) }}" class="inverse">{{ $category->title }}</a>{{ $count+1 != count($article->categories) ? ', ' : '' }}
                        @endforeach
                    </div>
                    <div class="Author__date">
                        {{ $article->published_at->format('jS F Y') }}
                    </div>
                </div>
                
                {{-- Image --}}
                @if ($article->image_url)
                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}" title="{{ $article->title }}" class="Show__image">
                @endif
                
                {{-- Share --}}
                <div class="Show__links">
                    <ul class="Show__share">
                        <li><span class="st_facebook_hcount" displayText="Facebook" st_url="{{ url()->current() }}" st_title="{{ $article->title }}" st_via="codegent"></span>
                        <li><span class="st_twitter_hcount" displayText="Tweet" st_url="{{ url()->current() }}" st_title="{{ $article->title }}" st_via="codegent"></span></li>
                        <li><span class="st_linkedin_hcount" displayText="LinkedIn" st_url="{{ url()->current() }}" st_title="{{ $article->title }}" st_via="codegent"></span></li>
                        <li><span class="st_email_hcount" displayText="Email" st_url="{{ url()->current() }}" st_title="{{ $article->title }}" st_via="codegent"></span></li>
                    </ul>
                    <div class="Show__link"><a href="{{ route('blog.index') }}"><i class="material-icons">keyboard_arrow_left</i> More articles</a></div>
                </div>
                
                {{-- Body --}}
                <div class="Show__body Format">
                    {!! Markdown::convertToHtml($article->body) !!}
                </div>
                
                {{-- Tags --}}
                <ul class="Tags">
                    @foreach ($article->tags as $tag)
                        <li class="Tag"><a href="{{ route('blog.tag', $tag->slug) }}" class="Tag__link">
                            <i class="material-icons">label</i> {{ $tag->title }}
                        </a></li>
                    @endforeach
                </ul>
                
            </div>
            @include('blog._sidebar')
        </div>
        
    </div></main>
    
    
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">
        try {
            stLight.options({publisher: "fa2bb35f-61ff-4587-acf7-a6bd12c51781", doNotHash: false, doNotCopy: false, hashAddressBar: false});
        } catch (ex) {};
    </script>
    
@endsection