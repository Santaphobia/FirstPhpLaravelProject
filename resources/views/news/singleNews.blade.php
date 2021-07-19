@extends('layouts.main')

@section('title')
    Новости
@endsection

@section('content')
    <h2>{{ $news->title }}</h2>
    <p> {{ $news->text }} </p>
    <p>Дата создания: {{ $news->created_at }}</p>
@endsection
