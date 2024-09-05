@extends('templates.main')


@section('content')
    <h1>Registration</h1>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6" id="main">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2>Create Your Account</h2>
                    </div>
                    <div class="card-body">


                        <form action="{{ route('register') }}" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="t1">Enter Name:</label>
                                <input type="text" class="form-control tb @error('name') is-invalid @enderror"
                                    id="t1" name="name" value="{{ old('name') }}" placeholder="Enter user here">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>
                            <div class="form-group">
                                <label for="t2">Enter Email ID:</label>
                                <input type="email" class="form-control tb @error('email') is-invalid @enderror"
                                    id="t2" name="email" value="{{ old('email') }}"
                                    placeholder="Enter Email ID here">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="t3">Enter Username:</label>
                                <input type="text" class="form-control tb @error('username') is-invalid @enderror"
                                    id="t3" name="username" value="{{ old('username') }}"
                                    placeholder="Enter Username here">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="t4">Enter Password:</label>
                                <input type="password" class="form-control tb @error('password') is-invalid @enderror"
                                    id="t4" name="password" value="{{ old('password') }}"
                                    placeholder="Enter Password here">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="t5">Enter Confirm Password:</label>
                                <input type="password"
                                    class="form-control tb @error('password_confirmation') is-invalid @enderror"
                                    id="t5" name="password_confirmation" value="{{ old('password_confirmation') }}"
                                    placeholder="Enter Password here">

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>



                            <div class="text-center">
                                <button type="reset" class="btn">Clear Form</button>
                                <button type="submit" class="btn">Create Account</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('title', 'Registration')
