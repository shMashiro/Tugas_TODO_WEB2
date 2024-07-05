@extends('layouts.admin.app')

@section('title', 'Buat Kategori')

@section('content')

<div class="container">
    <h2>Buat Kategori Baru</h2>
    <form method="POST" action="{{ route('todocategory.store') }}">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
