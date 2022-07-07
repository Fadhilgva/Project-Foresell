@extends('admin_toko.layout.core_store')

<title>Foresell - Data Produk Edit</title>

@section('judul')
    Edit Data Produk
@endsection

@section('content')

<form action="/data_produk" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label> Gambar Produk </label>
        <input type="file" name="gambar_produk" class="form-control">
    </div>
    
    <div class="form-group">
        <label> Product Name </label>
        <input type="text" name="produk" class="form-control">
    </div>

    

    <div class="form-group">
        <label for="exampleFormControlSelect1">Category</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>Makanan</option>
          <option>Gadget</option>
          <option>Kendaraan</option>
          <option>Mainan</option>
          <option>lain-lain</option>
        </select>
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

    <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0">Status</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
              <label class="form-check-label" for="gridRadios1">
                Aktif
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
              <label class="form-check-label" for="gridRadios2">
                Tidak Aktif
              </label>
            </div>
          </div>
        </div>
      </fieldset>

    <div class="form-group">
        <label> Date Created </label>
        <input type="text" name="harga" class="form-control">
    </div>
    

     <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection