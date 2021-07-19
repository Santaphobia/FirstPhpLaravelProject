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
    <form method="POST" action="{{ route('admin.users.save', ['id' => $user->id]) }}">
        @csrf
        <label>Имя:
            <input id="name" type="text" class="content_form" name="name" value="{{ $user->name ?? old('name') }}" required autocomplete="name" autofocus></label><br>
        <label>E-mail:
            <input id="email" type="email" class="content_form" name="email" value="{{ $user->email ?? old('email') }}" required autocomplete="email"></label><br>
        <label>Пароль:
            <input id="password" type="password" class="content_form" name="password" required autocomplete="new-password"></label><br>
        <label>Администратор:
            <input type="checkbox" name="is_admin" value="1" class="content_form"
                @if ($user->is_admin ?? old('is_admin'))
                   checked
                @endif
            ></label><br>
        <input type="submit" class="btn">
    </form>
@endsection
