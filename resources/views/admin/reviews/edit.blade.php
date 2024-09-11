@extends('templates.main')


@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h2 class="mb-0">{{ __('Edit Review') }}</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reviews.update', $review->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="author" class="form-label">{{ __('Author') }}</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror"
                                    id="author" name="author" value="{{ old('author', $review->author) }}" required
                                    autocomplete="author" autofocus>

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="comment" class="form-label">{{ __('Comment') }}</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3"
                                    required autocomplete="comment">{{ old('comment', $review->comment) }}</textarea>

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="rating" class="form-label">{{ __('Rating') }}</label>
                                <select class="form-control @error('rating') is-invalid @enderror" id="rating"
                                    name="rating" required>
                                    <option value="1" {{ old('rating', $review->rating) == 1 ? 'selected' : '' }}>1
                                    </option>
                                    <option value="2" {{ old('rating', $review->rating) == 2 ? 'selected' : '' }}>2
                                    </option>
                                    <option value="3" {{ old('rating', $review->rating) == 3 ? 'selected' : '' }}>3
                                    </option>
                                    <option value="4" {{ old('rating', $review->rating) == 4 ? 'selected' : '' }}>4
                                    </option>
                                    <option value="5" {{ old('rating', $review->rating) == 5 ? 'selected' : '' }}>5
                                    </option>
                                </select>

                                @error('rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Review') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
