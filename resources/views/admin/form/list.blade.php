@extends('layouts.admin')

@section('title', str_plural($what))
@section('body_class', 'Admin' . ucwords(str_plural($what)))

@inject('listing', 'App\Services\Admin\Listing')

@section('buttons')
    @if ($creatable)
        <a href="{{ $listing->getCreatePath() }}" class="Button Button--box">Create new</a>
    @endif
@endsection

@section('main')
    
    @include('components.admin.buttons', ['title' => $what])
    <aside class="Filters">
        <div class="Filters__counts">
            @if ($results->total())
                Showing <strong>{{ $results->firstItem() }}</strong> to <strong>{{ $results->lastItem() }}</strong> of <strong>{{ $results->total() }}</strong> results
            @endif
        </div>
        <form method="get" action="{{ url()->current() }}" class="Filters__form">
            @if (request()->get('q'))
                <a href="{{ url()->current() }}" class="Filters__all">All results</a>
            @endif
            <input type="text" name="q" value="{{ request()->get('q') }}" placeholder="Search..." />
        </form>
    </aside>
    <table class="Listing">
        <tr>
            @foreach ($grid as $idx => $field)
                <th class="Listing__heading {{ isset($field['main']) ? 'Listing__column--main' : null }} {{ isset($field['class']) ? $field['class'] : null }}">{{ $field['label'] }}</th>
            @endforeach
            @if ($deletable)
                <th class="Listing__heading"></th>
            @endif
        </tr>
        @forelse ($results as $result)
            <tr>
                @foreach ($grid as $idx => $field)
                    <td class="Listing__column {{ isset($field['main']) ? 'Listing__column--main' : null }}">
                        @if (isset($field['main'])) <a href="{{ $listing->getEditPath(['id' => $result->id]) }}"> @endif
                            {{ $listing->render($idx, $field, $result) }}
                        @if (isset($field['main'])) </a> @endif
                    </td>
                @endforeach
                @if ($deletable)
                    <td class="Listing__column">
                        <form method="post" action="{{ $listing->getDestroyPath(['id' => $result->id]) }}" class="DeleteForm">
                            <input type="hidden" name="_method" value="DELETE" />
                            {{ csrf_field() }}
                            <button type="submit" class="Listing__action Listing__action--danger"><i class="material-icons">delete_forever</i></button>
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td class="Listing__column Listing__column--center  Listing__column--notice" colspan="{{ count($grid) + ($deletable ? 1 : 0) }}">Sorry, we got no {{ strtolower(str_plural($what)) }} to show you!</td>
            </tr>
        @endforelse
    </table>
    
    {{ $results->appends(['q' => request()->get('q')])->links() }}
    
@endsection