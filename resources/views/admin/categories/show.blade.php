@extends('templates.main')

@section('content')
    <h1>{{ $category->name }}</h1>

    <h2>Тури в категорії</h2>
    <div class="row">
        @foreach ($category->tours as $tour)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tour->name }}</h5>
                        <p class="card-text">{{ $tour->description }}</p>
                        <p class="card-text">Ціна: {{ $tour->price }} $</p>
                        <a href="{{ route('tours.show', $tour) }}" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

@section('title', $category->name)
