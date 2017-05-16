@extends('layouts.admin')

@section('title', str_plural($what))
@section('body_class', ucwords(str_plural($what)))

@inject('listing', 'App\Services\Admin\Form')

@section('buttons')
    <a href="{{ $listing->getIndexPath() }}" class="Button Button--box">Back to listing</a>
@endsection

@section('main')
    
    @include('components.admin.buttons', ['title' => $what])
    
@endsection