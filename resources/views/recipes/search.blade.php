@extends('layouts.app')

@section('title', 'Search Recipes')

@section('content')
    <div class="container py-5">
        <h1 class="fw-bold mb-2">Search Results</h1>

        @if ($keyword)
            <p class="text-muted mb-4">Showing results for "<strong>{{ $keyword }}</strong>"</p>
        @endif

        <form action="{{ route('recipes.search') }}" method="GET" class="d-flex mb-5" style="max-width: 480px;">
            <input type="search" name="q" class="form-control" placeholder="Search for a recipe..." value="{{ $keyword }}">
            <button type="submit" class="btn btn-success ms-2">Search</button>
        </form>

        <div class="row g-4">
            @forelse ($recipes as $recipe)
                <div class="col-sm-6 col-lg-4">
                    <x-recipe-card :recipe="$recipe" />
                </div>
            @empty
                <p class="text-muted">No recipes matched your search.</p>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection
