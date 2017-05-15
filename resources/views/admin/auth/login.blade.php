@extends('layouts.admin')

@section('header', '')
@section('footer', '')

@section('main')
    <div class="Splash">
        
        <form method="post" action="{{ route('login') }}" class="Splash__box">
            {{ csrf_field() }}
            <h1 class="Splash__logo Logo Logo--small">Codegent CMS</h1>
            <input type="email" name="email" class="Splash__field" value="{{ old('email') }}" placeholder="Email address" required autofocus>
            @if ($errors->has('email'))
                <strong class="Splash__error">{{ $errors->first('email') }}</strong>
            @endif
            <input type="password" name="password" class="Splash__field" placeholder="Password" required>
            @if ($errors->has('password'))
                <strong class="Splash__error">{{ $errors->first('password') }}</strong>
            @endif
            <label class="Splash__check">
                <input name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox"> Remember Me
            </label>
            <button type="submit" class="Button Button--box">Login</button>
        </form>
        
    </div>
@endsection