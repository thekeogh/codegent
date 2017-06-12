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
        
        <h1 class="Thinking__title">
            @yield('title')
            <a href="{{ route('blog.index') }}"><i class="material-icons">close</i></a>
        </h1>
        
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
                
                {{-- Image/Video --}}
                @if ($article->video_url)
                    <div class="Show__media">
                        @if (str_contains($article->video_url, '.flv'))
                            <object type="application/x-shockwave-flash" id="movie-63" data="//codegent-codegentltd.netdna-ssl.com/static/swf/videoplayer_v3.swf?v=1.10.14-1.10.14-" width="845" height="475">
                                <param name="wmode" value="transparent">
                                <param name="allowscriptaccess" value="sameDomain">
                                <param name="flashvars" value="thumbPath={{ large($article->image_url, '845x475') }}&amp;filePath={{ $article->video_url }}&amp;notYoutube=0&amp;autoPlay=no&amp;viewMode=fitCrop&amp;smoothing=1">
                            </object>
                        @else
                            <video src="{{ $article->video_url }}" controls poster="{{ str_contains($article->video_url, '/flv/') ? $article->image_url : large($article->image_url, '845x475_50_50', 'thumb') }}" preload="auto"></video>
                        @endif
                    </div>
                @elseif ($article->image_url)
                    <img src="{{ large($article->image_url) }}" alt="{{ $article->title }}" title="{{ $article->title }}" class="Show__media">
                @endif
                
                {{-- YouTube --}}
                @if ($article->youtube_id)
                    <iframe width="100%" height="486" src="https://www.youtube.com/embed/{{ $article->youtube_id }}" frameborder="0" allowfullscreen class="Show__youtube"></iframe>
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