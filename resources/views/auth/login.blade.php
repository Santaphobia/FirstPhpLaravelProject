@extends('layouts.main')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Введите адрес вашей почты:
            <input id="email" type="email" class="content_form" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></label><br>
        <label>Введите пароль:
            <input id="password" type="password" class="content_form" name="password" required autocomplete="current-password"></label><br>
        <label>Запомнить:
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}></label><br>
        <input type="submit" class="btn">
        @if (Route::has('password.request'))
            <a class="content_link btn" href="{{ route('password.request') }}">Забыли пароль?</a>
        @endif
    </form>
@endsection
