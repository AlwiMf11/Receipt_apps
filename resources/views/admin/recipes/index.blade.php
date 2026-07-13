@extends('layouts.admin')

@section('title', 'Manage Recipes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Manage Recipes</h4>
        <a href="{{ route('admin.recipes.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Recipe
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Difficulty</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recipes as $recipe)
                        <tr>
                            <td>
                                @if ($recipe->thumbnail)
                                    <img src="{{ asset('storage/' . $recipe->thumbnail) }}" alt="{{ $recipe->title }}"
                                         class="rounded" style="width: 56px; height: 56px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $recipe->title }}</td>
                            <td>{{ $recipe->category->name ?? '-' }}</td>
                            <td>{{ ucfirst($recipe->difficulty) }}</td>
                            <td>
                                <span class="badge {{ $recipe->status === 'published' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($recipe->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.recipes.edit', $recipe) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.recipes.destroy', $recipe) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this recipe?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No recipes found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $recipes->links() }}
    </div>
@endsection
