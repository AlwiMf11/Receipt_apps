@extends('layouts.auth')

@section('title', 'Confirm Password')

@section('content')
    <h4 class="fw-bold mb-3">Confirm Password</h4>
    <p class="text-muted small mb-4">Please confirm your password before continuing.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autofocus>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">Confirm Password</button>
    </form>
@endsection
