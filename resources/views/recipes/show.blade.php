@extends('layouts.app')

@section('title', $recipe->title)

@section('content')
    <div class="container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('recipes.index') }}" class="text-decoration-none">Recipes</a></li>
                <li class="breadcrumb-item active">{{ $recipe->title }}</li>
            </ol>
        </nav>

        <div class="row g-5">
            <div class="col-lg-8">
                @if ($recipe->thumbnail)
                    <img src="{{ asset('storage/' . $recipe->thumbnail) }}" class="img-fluid rounded shadow-sm mb-4" alt="{{ $recipe->title }}">
                @endif

                @if ($recipe->category)
                    <a href="{{ route('categories.show', $recipe->category->slug) }}"
                       class="badge bg-success bg-opacity-10 text-success text-decoration-none mb-2">
                        {{ $recipe->category->name }}
                    </a>
                @endif

                <h1 class="fw-bold mb-3">{{ $recipe->title }}</h1>

                <div class="d-flex gap-4 text-muted mb-4 pb-3 border-bottom">
                    <span><i class="bi bi-clock"></i> {{ $recipe->cooking_time }} minutes</span>
                    <span><i class="bi bi-bar-chart"></i> {{ ucfirst($recipe->difficulty) }}</span>
                    <span><i class="bi bi-people"></i> {{ $recipe->servings }} servings</span>
                </div>

                <h4 class="fw-bold mb-3">Ingredients</h4>
                <ul class="mb-4">
                    @foreach (preg_split('/\r\n|\r|\n/', trim($recipe->ingredients)) as $ingredient)
                        @if (trim($ingredient) !== '')
                            <li>{{ $ingredient }}</li>
                        @endif
                    @endforeach
                </ul>

                <h4 class="fw-bold mb-3">Instructions</h4>
                <div class="mb-4">
                    @foreach (preg_split('/\r\n|\r|\n/', trim($recipe->instructions)) as $index => $step)
                        @if (trim($step) !== '')
                            <div class="d-flex mb-3">
                                <span class="badge bg-success rounded-circle me-3" style="height: 28px; width: 28px;">{{ $index + 1 }}</span>
                                <p class="mb-0">{{ $step }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4">
                <h5 class="fw-bold mb-3">Related Recipes</h5>
                <div class="d-flex flex-column gap-3">
                    @forelse ($relatedRecipes as $related)
                        <x-recipe-card :recipe="$related" />
                    @empty
                        <p class="text-muted small">No related recipes.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
