@extends('layouts.app')

@section('title', 'All Recipes')

@section('content')
    <div class="container py-5">
        <h1 class="fw-bold mb-4">All Recipes</h1>

        <div class="row g-4">
            @forelse ($recipes as $recipe)
                <div class="col-sm-6 col-lg-4">
                    <x-recipe-card :recipe="$recipe" />
                </div>
            @empty
                <p class="text-muted">No recipes found.</p>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection
