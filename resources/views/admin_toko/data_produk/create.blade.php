@extends('admin_toko.layout.core_store')

<title>Foresell - Data Produk Tambah</title>

@section('judul')
<p class="ms-2 title">Add New Product</p>
@endsection

@section('content')

<form action="/admin_toko/data_produk/{{$store_id->id}}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-group">
    <label>Category Name</label> <br>
    <select name="category_id" class="form-control" id="">
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
  @error('image')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label>Product Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ? old('name') : ''}}">
  </div>
  @error('name')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label>Slug Name</label>
    <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}">
  </div>
  @error('slug')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label>Product Price</label>
    <input type="int" name="price" class="form-control" value="{{ old('price') ? old('price') : ''}}">
  </div>
  @error('price')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label>Product Stock</label>
    <input type="int" name="stock" class="form-control" value="{{ old('stock') ? old('stock') : ''}}">
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
    <input type="text" name="discount" class="form-control" value="{{ old('discount') ? old('discount') : ''}}">
  </div>
  @error('discount')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label for="editor">Product Description</label>
    <textarea name="desc" class="form-control" id="editor" cols="30" rows="10">{{ old('desc') ? old('desc') : ''}}</textarea>
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

    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    name.addEventListener('change', () => {
        fetch('/admin_toko/data_produk/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug );
    });
</script>
@endsection