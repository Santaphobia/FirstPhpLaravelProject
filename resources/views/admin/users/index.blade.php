@extends('layouts.main')

@section('title')
    Пользователи
@endsection

@section('content')
    @forelse ($users as $item)
        <div class="content_block">
            <h2>{{$item->name}}</h2>
            @if($item->is_admin)
                <p>Администратор</p>
            @else
                <p>Гость</p>
            @endif
            <a class="content_link btn" href="{{ route('admin.users.update', ['id' => $item->id]) }}">
                Изменить
            </a>
        </div>
    @empty
        Новостей в нет!
    @endforelse
    {{$users->links()}}
@endsection
