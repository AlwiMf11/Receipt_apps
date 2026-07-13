@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}" class="text-decoration-none">Categories</a></li>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </nav>

        <h1 class="fw-bold mb-4">{{ $category->name }} Recipes</h1>

        <div class="row g-4">
            @forelse ($recipes as $recipe)
                <div class="col-sm-6 col-lg-4">
                    <x-recipe-card :recipe="$recipe" />
                </div>
            @empty
                <p class="text-muted">No recipes in this category yet.</p>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection
