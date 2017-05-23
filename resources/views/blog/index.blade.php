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
        
        <div class="Listing">
            <div class="Articles">
                
                <article class="Article">
                    <a href="#" class="Article__image" style="background-image: url({{ thumb('https://fp-customer-codegent.s3.amazonaws.com/www/uploads/img/original/UXru99jUyZ5wtPn/845x2000.jpeg') }})"></a>
                    <div class="Article__body">
                        <h2 class="Thinking__subtitle">Wither the low-hanging fruit</h2>
                        <p class="Article__author">Posted by Chris Bull, 5th July 2014</p>
                        <p class="Article__summary">It’s an interesting time to be a product studio. As the major distribution platforms for software have matured and encouraged loads of new market entrants, both competition and established monopolies have increased in what seems like equal measure.</p>
                    </div>
                </article>
                
                <article class="Article">
                    <a href="#" class="Article__image" style="background-image: url({{ thumb('https://fp-customer-codegent.s3.amazonaws.com/www/uploads/img/original/UXru99jUyZ5wtPn/845x2000.jpeg') }})"></a>
                    <div class="Article__body">
                        <h2 class="Thinking__subtitle">Wither the low-hanging fruit</h2>
                        <p class="Article__author">Posted by Chris Bull, 5th July 2014</p>
                        <p class="Article__summary">It’s an interesting time to be a product studio. As the major distribution platforms for software have matured and encouraged loads of new market entrants, both competition and established monopolies have increased in what seems like equal measure.</p>
                    </div>
                </article>
                
                <article class="Article">
                    <a href="#" class="Article__image" style="background-image: url({{ thumb('https://fp-customer-codegent.s3.amazonaws.com/www/uploads/img/original/UXru99jUyZ5wtPn/845x2000.jpeg') }})"></a>
                    <div class="Article__body">
                        <h2 class="Thinking__subtitle">Wither the low-hanging fruit</h2>
                        <p class="Article__author">Posted by Chris Bull, 5th July 2014</p>
                        <p class="Article__summary">It’s an interesting time to be a product studio. As the major distribution platforms for software have matured and encouraged loads of new market entrants, both competition and established monopolies have increased in what seems like equal measure.</p>
                    </div>
                </article>
                
            </div>
            <aside class="Sidebar">
                <section>
                    <h3 class="Thinking__sidetitle">Facebook</h3>
                    <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fcodegent&amp;width=200&amp;height=35&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:198px; height:35px;" allowTransparency="true"></iframe>
                </section>
                <section>
                    <h3 class="Thinking__sidetitle">Twitter</h3>
                    <iframe allowtransparency="true" frameborder="0" scrolling="no" data-show-screen-name="true" src="//platform.twitter.com/widgets/follow_button.html?screen_name=codegent" style="width:300px; height:20px;"></iframe>
                </section>
                <section class="Sidebar--categories">
                    <h3 class="Thinking__sidetitle">Categories</h3>
                    <ul class="Sidebar__items">
                        <li class="Sidebar__item"><a href="#" class="Sidebar__itemlink">Category one</a></li>
                        <li class="Sidebar__item"><a href="#" class="Sidebar__itemlink">Category two</a></li>
                        <li class="Sidebar__item"><a href="#" class="Sidebar__itemlink">Category three</a></li>
                    </ul>
                </section>
                <section class="Sidebar--recent">
                    <h3 class="Thinking__sidetitle">Recent posts</h3>
                    <a href="#" class="Sidebar__post" style="background-image: url({{ thumb('https://fp-customer-codegent.s3.amazonaws.com/www/uploads/img/original/UXru99jUyZ5wtPn/845x2000.jpeg') }})"></a>
                    <a href="#" class="Sidebar__post" style="background-image: url(https://codegent-codegentltd.netdna-ssl.com/media/thumb/577f726615ea9/680x310_50_50.jpg)"></a>
                </section>
            </aside>
        </div>
        
    </div></main>
    
@endsection