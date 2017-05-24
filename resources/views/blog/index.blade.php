@extends('layouts.www')
@section('body_class', 'Thinking')

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
                
                @include('components.article', [
                    'title' => 'Wither the low-hanging fruit',
                    'slug' => 'first-baby',
                    'image' => 'https://fp-customer-codegent.s3.amazonaws.com/www/uploads/img/original/UXru99jUyZ5wtPn/845x2000.jpeg',
                    'summary' => 'It’s an interesting time to be a product studio. As the major distribution platforms for software have matured and encouraged loads of new market entrants, both competition and established monopolies have increased in what seems like equal measure.',
                    'date' => new \Carbon\Carbon('2013-09-06'),
                    'author' => \App\Admin::first()
                ])
                
            </div>
            @include('blog._sidebar')
        </div>
        
    </div></main>
    
@endsection