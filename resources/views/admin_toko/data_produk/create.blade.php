@extends('admin_toko.layout.core_store')

<title>Foresell - Data Produk Tambah</title>

@section('judul')
    Tambah Data Produk
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
        <label> Product Picture </label>
        <input type="file" name="gambar_produk" class="form-control">
    </div>

    <div class="form-group">
        <label> Category </label>
        <input type="text" name="harga" class="form-control">
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea name="deskripsi" class="form-control" id="" cols="190" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label> Quantity </label>
        <input type="text" name="harga" class="form-control">
    </div>

    <div class="form-group">
        <label> Price </label>
        <input type="text" name="harga" class="form-control">
    </div>

    <div class="form-group">
        <label> Status </label><br>
        <input type="radio" name="status" value="0">Akfif<br>
        <input type="radio" name="status" value="1">Tidak Akfif
    </div>

    <div class="form-group">
        <label> Date Created </label>
        <input type="text" name="harga" class="form-control">
    </div>

{{-- 
    <div class="form-group">
        <label> Rating 2</label><br>
        <select>
            <optgroup label="rating">
                <option value="0">1</option>
                <option value="1">2</option>
                <option value="2">3</option>
                <option value="3">4</option>
                <option value="4">5</option>
        </select>
    </div>

     --}}

    

     <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection