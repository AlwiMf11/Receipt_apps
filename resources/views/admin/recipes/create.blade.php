@extends('layouts.admin')

@section('title', 'Add Recipe')

@section('content')
    <h4 class="fw-bold mb-4">Add Recipe</h4>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.recipes.store') }}" enctype="multipart/form-data">
                @include('admin.recipes._form')
            </form>
        </div>
    </div>
@endsection
