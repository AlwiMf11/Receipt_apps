@csrf

<div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
           name="name" value="{{ old('name', $category->name ?? '') }}" required autofocus>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-success">Save Category</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
</div>
