@extends('layouts.main')

@section('title')
    Создание категории
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
    <form method="post" action="
        @if($model->id)
            {{ route('admin.news.saveCategories' , ['id' => $model->id])}}
        @else
            {{ route('admin.news.saveCategories', ['id' => 0])}}
        @endif
        ">
        @csrf
        <label>Название Категории:
            <input type="text" name="title" class="content_form" value="{{ $model->title ?? old('title') }}"></label><br>
        <textarea name="description" cols="80" rows="10" placeholder="Описание категории" class="content_form">{{ $model->description ?? old('description') }}</textarea><br>
        <label>Активная ли категория:
            <input type="checkbox" name="is_active" value="1" class="content_form"
                @if ($model->is_active ?? old(' '))
                   checked
                @endif
            ></label><br>
        <input type="submit" class="btn">
    </form>
@endsection
