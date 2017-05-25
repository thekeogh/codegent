@extends('layouts.www')
@section('body_class', 'Thinking Thinking--blog')

@section('title', 'Blog: news &amp; views from Codegent')
@section('page_title', 'Blog') {{-- Displayed on page, not in borwser title --}}
@section('description', 'Insight articles on digital product design, startup studios, digital entrepreneurship &amp; internet trends')
@section('image', cdn('img/og/thinking.jpg'))

@section('secondary')
    @include('blog._secondary')
@endsection

@section('main')

    <main class="Main"><div class="Wrapper">
        
        <h1 class="Thinking__title">@yield('page_title')</h1>
        
        <div class="Blog">
            <div class="Content">
                
                @foreach ($listing as $list)
                    @include('components.article', [
                        'title' => $list->title,
                        'slug' => $list->slug,
                        'image' => $list->image_url,
                        'summary' => $list->summary,
                        'date' => $list->published_at,
                        'author' => $list->admin
                    ])
                @endforeach
                
                <div class="Paging Paging--inverse">
                    {{ $listing->links() }}
                </div>
                
            </div>
            @include('blog._sidebar')
        </div>
        
    </div></main>
    
@endsection