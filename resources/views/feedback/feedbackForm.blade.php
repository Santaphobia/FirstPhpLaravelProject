@extends('layouts.main')

@section('title')
    Форма обратной связи
@endsection

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
    <form action="{{ route('feedbackSend') }}" method="post">
        @csrf
        <label>Ваше имя:
            <input type="text" name="name" class="content_form" value="{{ old('name') }}"></label><br>
        <label>Ваша почта для обратной связи:
            <input type="text" name="email" class="content_form" value="{{ old('email') }}"></label><br>
        <textarea name="review" cols="80" rows="10" placeholder="Поле для ввода комментария / отзыва по работе проекта" class="content_form">{{ old('review') }}</textarea><br>
        <input type="submit" class="btn">
    </form>
@endsection
