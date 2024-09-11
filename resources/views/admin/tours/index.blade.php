@extends('templates.main')

@section('content')
    <h1>tours</h1>

    <a href="{{ route('tours.create') }}" class="btn btn-primary my-3">Create</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th>Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>


                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tour->image }}</td>
                    <td>{{ $tour->name }}</td>
                    <td>{{ $tour->description }}</td>
                    <td>{{ $tour->category->name }}</td>
                    <td>
                        {{-- як вивести назву категорією? --}}


                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Autem neque inventore eligendi dolorem, minus, dolor vero saepe sit cupiditate atque suscipit
                            ratione labore ex perspiciatis dicta molestiae sequi mollitia blanditiis.</p>

                    </td>

                    <td class="d-flex justify-content-center align-items-center">

                        <a href="{{ route('tours.edit', $tour) }}" class="btn btn-warning btn-sm me-2">Edit</a>


                        <form action="{{ route('tours.destroy', $tour) }}" method="POST">
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
