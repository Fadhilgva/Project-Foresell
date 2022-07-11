@extends('admin_toko.layout.core_store')

<title>Foresell - Edit</title>

@section('judul')
    Edit
@endsection

@section('content')

<form action="/admin_toko/kategori/{{$kategori -> id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label> Gambar kategori </label>
        <input type="file" name="image" class="form-control" value="{{$kategori->image}}">
    </div>
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label> Name </label>
        <input type="text" name="name" class="form-control value="{{$kategori->name}}">
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label> Slug </label>
        <input type="text" name="slug" class="form-control" value="{{$kategori->slug}}>
    </div>
    @error('slug')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label> Description </label>
        <textarea type="textarea" name="desc" class="form-control" >{{$kategori->desc}}</textarea>
    </div>
    @error('desc')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection