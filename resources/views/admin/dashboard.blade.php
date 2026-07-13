@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">Total Recipes</div>
                    <div class="fs-3 fw-bold">{{ $totalRecipes }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">Published</div>
                    <div class="fs-3 fw-bold text-success">{{ $publishedRecipes }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">Drafts</div>
                    <div class="fs-3 fw-bold text-warning">{{ $draftRecipes }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">Categories</div>
                    <div class="fs-3 fw-bold">{{ $totalCategories }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white fw-semibold">Recently Added Recipes</div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentRecipes as $recipe)
                        <tr>
                            <td>{{ $recipe->title }}</td>
                            <td>{{ $recipe->category->name ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $recipe->status === 'published' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($recipe->status) }}
                                </span>
                            </td>
                            <td>{{ $recipe->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">No recipes yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
