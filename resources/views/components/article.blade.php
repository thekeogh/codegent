<article class="Article">
    @if ($image)
        <a href="{{ route('blog.show', [$date->format('Y'), $date->format('j'), $slug]) }}" class="Article__image" style="background-image: url({{ thumb($image) }})"></a>
    @endif
    <div class="Article__body">
        <h2 class="Thinking__subtitle"><a href="{{ route('blog.show', [$date->format('Y'), $date->format('j'), $slug]) }}">{{ $title }}</a></h2>
        <p class="Article__author">Posted by {{ $author->name }}, {{ $date->format('jS F Y') }}</p>
        @if ($summary)
            <p class="Article__summary">{{ $summary }}</p>
        @endif
    </div>
</article>