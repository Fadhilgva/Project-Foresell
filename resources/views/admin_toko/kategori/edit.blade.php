@extends('admin_toko.layout.core_store')

<title>Foresell - Edit Kategori</title>

@section('judul')
    Edit kategori
@endsection

@section('content')

<form action="/data_produk" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label> Id. </label>
        <input type="text" name="produk" class="form-control">
    </div>
    
    <div class="form-group">
        <label> Category </label>
        <input type="text" name="produk" class="form-control">
    </div>

    <div class="form-group">
        <label> Description </label>
        <input type="text" name="harga" class="form-control">
    </div>

     <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection