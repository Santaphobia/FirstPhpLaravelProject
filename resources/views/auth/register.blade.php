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
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Ваше имя:
        <input id="name" type="text" class="content_form" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus></label><br>
        <label>Ваш e-mail:
        <input id="email" type="email" class="content_form" name="email" value="{{ old('email') }}" required autocomplete="email"></label><br>
        <label>Ваш пароль:
        <input id="password" type="password" class="content_form" name="password" required autocomplete="new-password"></label><br>
        <label>Подтвердите ваш пароль:
        <input id="password-confirm" type="password" class="content_form" name="password_confirmation" required autocomplete="new-password"></label><br>
        <input type="submit" class="btn">
    </form>
@endsection
