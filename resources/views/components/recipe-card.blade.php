@props(['recipe'])

<div class="card h-100 border-0 shadow-sm recipe-card">
    <a href="{{ route('recipes.show', $recipe->slug) }}">
        @if ($recipe->thumbnail)
            <img src="{{ asset('storage/' . $recipe->thumbnail) }}" class="card-img-top" alt="{{ $recipe->title }}" style="height: 200px; object-fit: cover;">
        @else
            <div class="card-img-top bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                <i class="bi bi-egg-fried fs-1 text-success"></i>
            </div>
        @endif
    </a>

    <div class="card-body d-flex flex-column">
        @if ($recipe->category)
            <a href="{{ route('categories.show', $recipe->category->slug) }}"
               class="badge bg-success bg-opacity-10 text-success text-decoration-none mb-2 align-self-start">
                {{ $recipe->category->name }}
            </a>
        @endif

        <h5 class="card-title mb-2">
            <a href="{{ route('recipes.show', $recipe->slug) }}" class="text-decoration-none text-dark">
                {{ $recipe->title }}
            </a>
        </h5>

        <div class="d-flex text-muted small mt-auto pt-2 gap-3">
            <span><i class="bi bi-clock"></i> {{ $recipe->cooking_time }} min</span>
            <span><i class="bi bi-bar-chart"></i> {{ ucfirst($recipe->difficulty) }}</span>
            <span><i class="bi bi-people"></i> {{ $recipe->servings }}</span>
        </div>
    </div>
</div>
