@extends('templates.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6" id="main">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2>Create Your Review</h2>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="author">Author</label>
                                <input type="text" name="author" id="author"
                                    class="form-control tb @error('author') is-invalid @enderror"
                                    value="{{ old('author') }}">

                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>

                            <div class="mt-3">
                                <label for="review">Review</label>
                                <input type="text" name="review" id="review"
                                    class="form-control tb @error('review') is-invalid @enderror"
                                    value="{{ old('review') }}">

                                @error('review')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="mt-3">
                                <label for="rating">Rating</label>
                                <input type="number" name="rating" id="rating"
                                    class="form-control tb @error('rating') is-invalid @enderror">

                                @error('rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Create Reviews')
