@extends('layouts.admin')

@section('title', str_plural($what) . ($type == 'create' ? ' - Create new' : ' - Edit'))
@section('body_class', ucwords(str_plural($what)))

@inject('form', 'App\Services\Admin\Form')

@section('buttons')
    <a href="{{ $form->getIndexPath() }}" class="Button Button--box">Back to listing</a>
@endsection

@section('main')
    
    @if ($errors->count())
        <aside class="Alert Alert--error">
            @foreach ($errors->all() as $message)
                {{ $message }}<br>
            @endforeach
        </aside>
    @endif
    
    @include('components.admin.buttons', ['title' => $what])
    <form method="post" action="{{ $action }}" class="AdminForm">
        <input type="hidden" name="_method" value="{{ $method }}" />
        {{ csrf_field() }}
        
        @foreach ($fields as $name => $field)
            {{ $form->render($name, $field) }}
        @endforeach
        
        <div class="AdminForm__row AdminForm__row--buttons">
            <div class="AdminForm__buttons">
                <button type="submit" class="Button Button--box">{{ $type == 'create' ? 'Create ' . strtolower($what) : 'Save changes' }}</button>
            </div>
        </div>
        
    </form>
    
@endsection