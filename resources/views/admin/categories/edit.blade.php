@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <h4 class="fw-bold mb-4">Edit Category</h4>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                @method('PUT')
                @include('admin.categories._form')
            </form>
        </div>
    </div>
@endsection
