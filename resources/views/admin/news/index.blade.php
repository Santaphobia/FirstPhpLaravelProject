@extends('layouts.main')

@section('title')
    Новости
@endsection

@section('content')
    @forelse ($news as $item)
        <div class="content_block">
            <h2>{{$item->title}}</h2>
            @if($item->is_active)
                <p>Активна</p>
            @else
                <p>Не активна</p>
            @endif
            <a class="content_link btn" href="{{ route('admin.news.update', ['id' => $item->id]) }}">
                Изменить
            </a>
            <a class="content_link btn" href="{{ route('admin.news.delete', ['id' => $item->id]) }}">
                <p>Активировать/Деактивировать</p>
            </a>
        </div>
    @empty
        Новостей в нет!
    @endforelse
   {{$news->links()}}
@endsection


