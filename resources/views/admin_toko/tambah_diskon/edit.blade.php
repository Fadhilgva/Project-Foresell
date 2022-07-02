@extends('admin_toko.layout.core_store')

<title>Foresell - Tambah Diskon Edit</title>

@section('judul')
    Edit Tambah Diskon
@endsection

@section('content')

<form action="/data_produk" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label> No. </label>
        <input type="text" name="produk" class="form-control">
    </div>
    
    <div class="form-group">
        <label> Product Name </label>
        <input type="text" name="produk" class="form-control">
    </div>

    <div class="form-group">
        <label> Price </label>
        <input type="text" name="harga" class="form-control">
    </div>

    <div class="form-group">
        <label> Discount </label>
        <input type="text" name="harga" class="form-control">
    </div>
    

     <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection