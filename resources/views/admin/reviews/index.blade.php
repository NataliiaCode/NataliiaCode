@extends('templates.main')

@section('content')
    <h1>Reviews</h1>

    <a href="{{ route('reviews.create') }}" class="btn btn-primary my-3">Create Reviews</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Автор</th>
                <th scope="col">Відгук</th>
                <th scope="col" class="text-center">Оцінка</th>
                <th scope="col" class="text-center">Дії</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->author }}</td>
                    <td>{{ $review->review }}</td>
                    <td class="text-center">{{ $review->rating }}</td>
                    <td class="text-center">

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endSection
