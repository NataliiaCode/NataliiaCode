@extends('templates.main')

@section('content')
    <h1>Edit Tour {{ $category->name }}</h1>



    <form action="{{ route('tours.update', $category->id) }}" method="POST">
        @method('PUT')



        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name"
                class="form-control 
            tb @error('name') is-invalid @enderror"
                value="{{ old('name', $category->name) }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mt-3">
            <label for="description">Description</label>
            <input type="text" name="description" id="description"
                class="form-control
            tb @error('description') is-invalid @enderror"
                value="{{ old('description', $category->description) }}">
        </div>


        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror



        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endSection
