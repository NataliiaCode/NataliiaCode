@extends('templates.main')

@section('content')
    <h1>{{ $tour->title }}</h1>

    <img src="{{ asset($tour->image) }}" alt="{{ $tour->title }}" width="300">

    <p>{{ $tour->description }}</p>
    <p>Категорія: {{ $tour->category->name }}</p>
    <p>Ціна: {{ $tour->price }}$</p>



@endsection

@section('title', $tour->title)
