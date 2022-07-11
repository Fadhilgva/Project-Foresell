@extends('admin_toko.layout.core_store')

<title>Foresell - Tambah Kategori</title>

@section('judul')
    Tambah kategori
@endsection

@section('content')
    <form action="/admin_toko/kategori/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label> Gambar kategori </label>
            <input type="file" name="image" class="form-control">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label> Name </label>
            <input type="text" name="name" class="form-control">
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label> Slug </label>
            <input type="text" name="slug" class="form-control">
        </div>
        @error('slug')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label> Description </label>
            <textarea type="textarea" name="desc" class="form-control"></textarea>
        </div>
        @error('desc')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
