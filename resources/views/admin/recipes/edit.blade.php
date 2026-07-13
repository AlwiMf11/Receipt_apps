@extends('layouts.admin')

@section('title', 'Edit Recipe')

@section('content')
    <h4 class="fw-bold mb-4">Edit Recipe</h4>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.recipes.update', $recipe) }}" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.recipes._form')
            </form>
        </div>
    </div>
@endsection
