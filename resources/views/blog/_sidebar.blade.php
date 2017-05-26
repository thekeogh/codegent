<aside class="Sidebar">
    <section>
        <h3 class="Thinking__sidetitle">Facebook</h3>
        <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fcodegent&amp;width=200&amp;height=35&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;send=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:198px; height:35px;" allowTransparency="true"></iframe>
    </section>
    <section>
        <h3 class="Thinking__sidetitle">Twitter</h3>
        <iframe allowtransparency="true" frameborder="0" scrolling="no" data-show-screen-name="true" src="//platform.twitter.com/widgets/follow_button.html?screen_name=codegent" style="width:300px; height:20px;"></iframe>
    </section>
    @if ($categories->count())
        <section class="Sidebar--categories">
            <h3 class="Thinking__sidetitle">Categories</h3>
            <ul class="Sidebar__items">
                <li class="Sidebar__item"><a href="{{ route('blog.index') }}" class="Sidebar__itemlink" style="{{ !$selected_category ? 'font-weight: bold' : null }}">All articles</a></li>
                @foreach ($categories as $category)
                    <li class="Sidebar__item"><a href="{{ route('blog.category', $category->slug) }}" class="Sidebar__itemlink" style="{{ ($selected_category and $selected_category->slug == $category->slug) ? 'font-weight: bold' : null }}">{{ $category->title }}</a></li>
                @endforeach
            </ul>
        </section>
    @endif
    @if ($latest->count())
        <section class="Sidebar--recent">
            <h3 class="Thinking__sidetitle">Recent posts</h3>
            @foreach ($latest as $latest_article)
                <a href="{{ route('blog.show', [$latest_article->published_at->format('Y'), $latest_article->published_at->format('n'), $latest_article->slug]) }}" class="Sidebar__post" style="background-image: url({{ thumb($latest_article->image_url) }})"></a>
            @endforeach
        </section>
    @endif
</aside>