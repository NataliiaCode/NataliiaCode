@extends('templates.main')


@section('content')
    {{-- <h1>{{ $title }}</h1>
    <h2>{!! $subtitle !!}</h2>



    @foreach ($users as $user)
        <p>{{ $user }}</p>
        <!-- <p>{{ $loop->iteration }}</p> -->
    @endforeach --}}


    {{-- Треба вивести сюди категорії та тури --}}


    <h2>Категорії</h2>
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <p class="card-text"><strong>Тури:</strong></p>
                        <ul>
                            @foreach ($category->tours as $tour)
                                <li>{{ $tour->name }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-primary">Переглянути тури</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    <h2>Тури</h2>
    <div class="row">
        @foreach ($tours as $tour)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tour->name }}</h5>
                        <p class="card-text">Категорія: {{ $tour->category->name }}</p>
                        <p class="card-text">{{ Str::limit($tour->description, 100) }}</p>

                        @if (!empty($tour->image))
                            <img src="{{ asset($tour->image) }}" alt="{{ $tour->name }}" class="card-img-top">
                        @endif

                        <p class="card-text">Ціна: {{ $tour->price }} $</p>
                        <a href="{{ route('tours.show', $tour) }}" class="btn btn-primary">Детальніше</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>




@endsection

@section('title', $title)
