@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Register</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" value="" class="form-control" required autofocus>
                    @error('name')
                        <div class="text-danger mt-1"></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" value="" class="form-control" required>
                    @error('email')
                        <div class="text-danger mt-1"></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <div class="text-danger mt-1"></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Create Account</button>
            </form>
        </div>
    </div>
</div>
@endsection