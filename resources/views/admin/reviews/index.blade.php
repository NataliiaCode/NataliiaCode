@extends('templates.main')

@section('content')
    <h1>Reviews</h1>

    <a href="{{ route('reviews.create') }}" class="btn btn-primary my-3">Create</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Author</th>
                <th scope="col">Comment</th>
                <th scope="col">Rating</th>
                <th scope="col">Tour</th> <!-- Додаємо стовпець для туру -->


                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->author }}</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->rating }}</td>

                    <!-- Відображаємо назву туру -->
                    <td>
                        @if ($review->tour)
                            <!-- Перевірка наявності туру -->
                            {{ $review->tour->name }}
                        @else
                            N/A <!-- Якщо туру немає, показуємо "N/A" -->
                        @endif
                    </td>


                    <td class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('reviews.edit', $review) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
