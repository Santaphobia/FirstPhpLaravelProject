@extends('layouts.main')

@section('title')
    Создание новости
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
            {{ route('admin.news.saveNews' , ['id' => $model->id])}}
        @else
            {{ route('admin.news.saveNews', ['id' => 0])}}
        @endif
        ">
        @csrf
        <label>Название новости:
            <input type="text" name="title" class="content_form" value="{{ $model->title ?? old('title') }}"></label><br>
        <textarea name="description" cols="80" rows="10" placeholder="Описание новости" class="content_form">{{ $model->description ?? old('description') }}</textarea><br>
        <textarea name="text" cols="80" rows="10" placeholder="Текст" class="content_form">{{ $model->text ?? old('text') }}</textarea><br>
        <label>Выберете категорию новости:
            <select class="content_form" name="categories_id">
            @if($model->categories_id)
                <option value="{{ $categories->id }}">{{ $categories->title }}</option>
            @else
                @foreach($categories as $value)
                    <option value="{{ $value->id }}"
                            @if ($value->id == old('categories_id'))
                                selected
                            @endif
                    >{{ $value->title }}</option>
                @endforeach
            @endif
        </select></label><br>
        <label>Активная ли новость:
            <input type="checkbox" name="is_active" value="1" class="content_form"
                @if ($model->is_active ?? old('is_active'))
                    checked
                @endif
            ></label><br>
        <label>Дата публикации:
            @if($model->publication_date)
                <p>{{ $model->publication_date }}</p>
            @endif
            <input type="date" name="publication_date" dataformatas="Y-m-d" class="content_form" value="{{ old('publication_date') }}"></label><br>
        <input type="submit" class="btn">
    </form>
@endsection
