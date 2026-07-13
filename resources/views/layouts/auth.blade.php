<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RecipeHub') }} - @yield('title', 'Authentication')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="w-100" style="max-width: 480px;">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="fs-3 fw-bold text-decoration-none text-dark">
                    Recipe<span class="text-success">Hub</span>
                </a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-4">
                    @yield('content')
                </div>
            </div>

            <p class="text-center text-muted mt-3 mb-0">
                <a href="{{ route('home') }}" class="text-decoration-none">&larr; Back to website</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
