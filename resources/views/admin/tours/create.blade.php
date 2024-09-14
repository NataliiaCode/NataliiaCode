@extends('templates.main')

@section('content')
    <h1>Create Tour</h1>



    <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                class="form-control 
            tb @error('name') is-invalid @enderror" value="{{ old('name') }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mt-3">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>


        <div class="mt-3">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>


        <div class="mt-3">
            <label for="image">Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-3">

            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>


        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endSection
