@extends('layouts.app')

@section('title', 'Discover Delicious Recipes')

@section('content')
    <section class="bg-success bg-opacity-10 py-5">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold mb-3">Discover &amp; Cook Delicious Recipes</h1>
                    <p class="lead text-muted mb-4">
                        Browse hundreds of hand-picked recipes, from quick weeknight dinners to weekend feasts.
                    </p>
                    <form action="{{ route('recipes.search') }}" method="GET" class="d-flex" style="max-width: 480px;">
                        <input type="search" name="q" class="form-control form-control-lg" placeholder="Search for a recipe...">
                        <button type="submit" class="btn btn-success btn-lg ms-2">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Featured Recipes</h2>
            <a href="{{ route('recipes.index') }}" class="text-success text-decoration-none">View all &rarr;</a>
        </div>

        <div class="row g-4">
            @forelse ($featuredRecipes as $recipe)
                <div class="col-sm-6 col-lg-4">
                    <x-recipe-card :recipe="$recipe" />
                </div>
            @empty
                <p class="text-muted">No featured recipes yet.</p>
            @endforelse
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center">Browse by Category</h2>
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
    </section>

    <section class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Latest Recipes</h2>
            <a href="{{ route('recipes.index') }}" class="text-success text-decoration-none">View all &rarr;</a>
        </div>

        <div class="row g-4">
            @forelse ($latestRecipes as $recipe)
                <div class="col-sm-6 col-lg-3">
                    <x-recipe-card :recipe="$recipe" />
                </div>
            @empty
                <p class="text-muted">No recipes yet.</p>
            @endforelse
        </div>
    </section>
@endsection
