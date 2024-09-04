@extends('templates.main')


@section('content')
    <h1>{{ $title }}</h1>
    <h2>{!! $subtitle !!}</h2>

    <!-- треба підключити силку на сторінку news -->
    <a href="{{ route('news') }}">News</a>

    @foreach ($users as $user)
        <p>{{ $user }}</p>
        <!-- <p>{{ $loop->iteration }}</p> -->
    @endforeach
@endsection

@section('title', $title)

