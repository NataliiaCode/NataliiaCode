@extends('templates.main')


@section('content')
    <h2 class="h2">News</h2>



    {{-- <a href="{{ route('home') }}">Home</a> --}}
    {{-- <a href="{{ route('home') }}" class="btn btn-primary">Home</a> --}}




    <ul class="list-group">
        @foreach ($news as $item)
            <li class="list-group-item">
                <h4 class="mb-1">{{ $item['title'] }}</h4>
                <p class="mb-1">{{ $item['content'] }}</p>
                <small class="text-muted">Дата публікації: {{ $item['date'] }}</small>
            </li>
        @endforeach
    </ul>




@endSection

@section('title', 'News')
