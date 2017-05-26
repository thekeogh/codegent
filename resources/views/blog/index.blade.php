@extends('layouts.www')
@section('body_class', 'Thinking Thinking--blog')

@if ($selected_category)
    @section('title', "Blog: {$selected_category->title}")
    @section('page_title')
        {{ $selected_category->title }}
        <a href="{{ route('blog.index') }}"><i class="material-icons">close</i></a>
    @endsection
@elseif ($selected_tag)
    @section('title', "Blog: {$selected_tag->title}")
    @section('page_title')
        {{ $selected_tag->title }}
        <a href="{{ route('blog.index') }}"><i class="material-icons">close</i></a>
    @endsection
@else
    @section('title', 'Blog: news &amp; views from Codegent')
    @section('page_title', 'Blog')
@endif
@section('description', 'Insight articles on digital product design, startup studios, digital entrepreneurship &amp; internet trends')
@section('image', cdn('img/og/thinking.jpg'))

@section('secondary')
    @include('blog._secondary')
@endsection

@section('main')

    <main class="Main"><div class="Wrapper">
        
        <h1 class="Thinking__title">
            @yield('page_title')
        </h1>
        
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