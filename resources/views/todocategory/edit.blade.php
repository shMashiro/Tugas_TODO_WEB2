@extends('layouts.admin.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="container">
    <h2>Edit Kategori</h2>
    <form method="POST" action="{{ route('todocategory.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ $category->category }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
