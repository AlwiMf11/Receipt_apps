@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
    <h4 class="fw-bold mb-4">Add Category</h4>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @include('admin.categories._form')
            </form>
        </div>
    </div>
@endsection
