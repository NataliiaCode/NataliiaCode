@extends('templates.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <h1>{{ $tour->title }}</h1>
                    <h2>{{ $tour->name }}</h2>

                    <div class="card-body">

                        <img src="{{ asset($tour->image) }}" alt="{{ $tour->title }}" width="300">

                        <p>{{ $tour->description }}</p>
                        <p>Категорія: {{ $tour->category->name }}</p>
                        <p>Ціна: {{ $tour->price }}$</p>

                        <!-- Відгуки -->
                        <p><strong>Відгуки:</strong></p>

                        <div class="card-body">
                            <!-- Відображення відгуків -->
                            <div id="reviews-container" class="border rounded p-3">
                                @foreach ($tour->reviews as $review)
                                    <div class="review mb-3">
                                        <div class="d-flex flex-column">
                                            <p class="mb-1">
                                                <strong>{{ $review->user->name ?? 'Анонім' }}</strong>:
                                                {{ $review->comment }}
                                            </p>
                                            <p class="mb-0">
                                                Рейтинг: {{ $review->rating }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        @if (auth()->check())
                            <!-- Форма для додавання відгуку -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#reviewModal">
                                Залишити відгук
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="reviewModalLabel">Залишити відгук</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('reviews.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="tour_id" value="{{ $tour->id }}">

                                                <div class="form-group">
                                                    <label for="comment">Ваш відгук:</label>
                                                    <textarea class="form-control" id="comment" name="comment"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="rating">Рейтинг:</label>
                                                    <select class="form-control" id="rating" name="rating">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Надіслати відгук</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Закрити</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Повідомлення для неавторизованих користувачів -->
                            <p>Будь ласка, <a href="{{ route('login') }}">увійдіть</a>, щоб залишити відгук.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title', $tour->title)
