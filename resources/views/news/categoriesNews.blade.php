@extends('layouts.main')

@section('title')
    Новости в категории
@endsection

@section('content')
    <h2>Новости в категории {{ $category->title }}:</h2>
    @forelse($news as $value)
        <div class="content_block">
            <h3><a href="{{ route('news.singleNews', $value->id) }}" class="content_link">{{ $value->title }}</a></h3>
            <p class="content_text">{{ $value->description }}</p>
        </div>
    @empty
        <p>Новостей в данной категории нет</p>
    @endforelse
    {{$news->links()}}
@endsection
