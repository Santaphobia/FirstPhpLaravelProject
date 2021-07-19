@extends('layouts.main')

@section('title')
    Категории
@endsection

@section('content')
    @forelse ($categories as $item)
        <div class="content_block">
            <h2>{{$item->title}}</h2>
            @if($item->is_active)
                <p>Активна</p>
            @else
                <p>Не активна</p>
            @endif
            <a class="content_link btn" href="{{ route('admin.news.updateCategories', ['id' => $item->id]) }}">
                Изменить
            </a>
            <a class="content_link btn" href="{{ route('admin.news.deleteCategories', ['id' => $item->id]) }}">
                <p>Активировать/Деактивировать</p>
            </a>
        </div>
    @empty
        Новостей в нет!
    @endforelse
@endsection
