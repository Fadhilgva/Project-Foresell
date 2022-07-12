@extends('admin_toko.layout.core_store')

<title>Foresell - Data Produk Tambah</title>

@section('judul')
    Tambah Data Produk
@endsection

@section('content')

<form action="/admin_toko/data_produk/{{$store_id->id}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label>Category Name</label> <br>
          <select name="category_id" class="form-control" id=""  >
              <option value="">---Choose Category---</option>

              @foreach ($category as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
          </select>
    </div>
    @error('category_id')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    {{-- <div class="form-group">
      <label>Store Name</label> <br>
          <select name="store_id" class="form-control" id="">
              <option value="">---Choose Store---</option>

              @foreach ($store as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
          </select>
    </div>
    @error('store_id')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}


    <div class="form-group">
      <label>Product Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    @error('Image')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    {{-- <div class="form-group">
        <label>Slug Name</label>
        <input type="text" name="slug" class="form-control">
    </div>
    @error('slug')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}


    <div class="form-group">
      <label>Product Price</label>
      <input type="int" name="price" class="form-control">
    </div>
    @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group">
      <label>Product Stock</label>
      <input type="int" name="stock" class="form-control">
    </div>
    @error('stock')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    {{-- <div class="form-group">
      <label>Product Sold</label>
      <input type="int" name="sold" class="form-control">
    </div>
    @error('sold')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}


    <div class="form-group">
      <label>Product Discount</label>
      <input type="text" name="discount" class="form-control">
    </div>
    @error('discount')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group">
      <label for="editor">Product Description</label>
      <textarea name="desc" class="form-control" id="editor" cols="30" rows="10"></textarea>
    </div>
    @error('desc')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

     <button type="submit" class="btn btn-primary">Submit</button>
</form>

{{-- EDITOR TEXT --}}
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
