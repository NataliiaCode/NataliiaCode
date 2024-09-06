@extends('templates.main')

@section('content')
    <h1>Categories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-primary my-3">Create</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="text-center">

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
