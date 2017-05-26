<article class="Product">
    <a href="{{ $url }}" class="Product__image{{ isset($overlay) ? ' Overlayer' : null }}" target="_blank"><img src="{{ cdn('img/logos/' . $image) }}" alt="{{ $name }}" title="{{ $name }}"></a>
    <div class="Product__details">
        <h3 class="Product__title">{{ $name }} <span>{!! $state !!}</span></h3>
        <p>{{ $description }}</p>
        <a href="{{ $url }}" class="Button Button--box-invert{{ isset($overlay) ? ' Overlayer' : null }}" target="_blank">{{ $visit or 'visit website' }}</a>
    </div>
</article>