@if ($paginator->hasPages())
    <ul class="Paging">
        @if (! $paginator->onFirstPage())
            <li class="Paging__prev"><a href="{{ $paginator->previousPageUrl() }}" class="Paging__link"><i class="material-icons">skip_previous</i></a></li>
        @endif
        
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="Paging__page">
                        @if ($page != $paginator->currentPage()) <a href="{{ $url }}" class="Paging__link"> @endif
                            {{ $page }}
                        @if ($page != $paginator->currentPage()) </a> @endif
                    </li>
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="Paging__next"><a href="{{ $paginator->nextPageUrl() }}" class="Paging__link"><i class="material-icons">skip_next</i></a></li>
        @endif
    </ul>
@endif