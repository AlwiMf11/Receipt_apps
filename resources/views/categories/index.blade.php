@extends('layouts.app')

@section('title', 'Recipe Categories')

@section('content')
    <div class="container py-5">
        <h1 class="fw-bold mb-4">Recipe Categories</h1>

        <div class="row g-3">
            @foreach ($categories as $category)
                <div class="col-6 col-md-3">
                    <a href="{{ route('categories.show', $category->slug) }}"
                       class="card border-0 shadow-sm text-decoration-none text-dark h-100">
                        <div class="card-body text-center py-4">
                            <i class="bi bi-egg-fried fs-2 text-success mb-2 d-block"></i>
                            <span class="fw-semibold">{{ $category->name }}</span>
                            <div class="text-muted small">{{ $category->recipes_count }} recipes</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
