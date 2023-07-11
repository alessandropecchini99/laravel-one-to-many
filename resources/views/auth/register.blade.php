@extends('guest.layouts.base')

@section('title', 'Register')

@section('main') 

    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            {{-- email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
            </div>

            {{-- password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" required autocomplete="current-password" name="password">
            </div>

            {{-- confirm password --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" required autocomplete="current-password" name="password_confirmation">
            </div>

                <a  href="{{ route('login') }}">
                    Already registered?
                </a>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

@endsection
