@csrf

<div class="row g-3">
    <div class="col-md-8">
        <label for="title" class="form-label">Title</label>
        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
               name="title" value="{{ old('title', $recipe->title ?? '') }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="category_id" class="form-label">Category</label>
        <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
            <option value="">Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $recipe->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="cooking_time" class="form-label">Cooking Time (minutes)</label>
        <input id="cooking_time" type="number" min="1" class="form-control @error('cooking_time') is-invalid @enderror"
               name="cooking_time" value="{{ old('cooking_time', $recipe->cooking_time ?? '') }}" required>
        @error('cooking_time')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="servings" class="form-label">Servings</label>
        <input id="servings" type="number" min="1" class="form-control @error('servings') is-invalid @enderror"
               name="servings" value="{{ old('servings', $recipe->servings ?? '') }}" required>
        @error('servings')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="difficulty" class="form-label">Difficulty</label>
        <select id="difficulty" class="form-select @error('difficulty') is-invalid @enderror" name="difficulty" required>
            @foreach (['easy', 'medium', 'hard'] as $level)
                <option value="{{ $level }}" {{ old('difficulty', $recipe->difficulty ?? 'easy') === $level ? 'selected' : '' }}>
                    {{ ucfirst($level) }}
                </option>
            @endforeach
        </select>
        @error('difficulty')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="thumbnail" class="form-label">Thumbnail</label>
        <input id="thumbnail" type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
        @error('thumbnail')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if (! empty($recipe) && $recipe->thumbnail)
            <img src="{{ asset('storage/' . $recipe->thumbnail) }}" class="rounded mt-2" style="height: 80px;">
        @endif
    </div>

    <div class="col-md-6">
        <label for="status" class="form-label">Status</label>
        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status" required>
            @foreach (['draft', 'published'] as $status)
                <option value="{{ $status }}" {{ old('status', $recipe->status ?? 'draft') === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
        @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="ingredients" class="form-label">Ingredients <span class="text-muted small">(one per line)</span></label>
        <textarea id="ingredients" rows="6" class="form-control @error('ingredients') is-invalid @enderror"
                  name="ingredients" required>{{ old('ingredients', $recipe->ingredients ?? '') }}</textarea>
        @error('ingredients')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="instructions" class="form-label">Instructions <span class="text-muted small">(one step per line)</span></label>
        <textarea id="instructions" rows="8" class="form-control @error('instructions') is-invalid @enderror"
                  name="instructions" required>{{ old('instructions', $recipe->instructions ?? '') }}</textarea>
        @error('instructions')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-success">Save Recipe</button>
    <a href="{{ route('admin.recipes.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
