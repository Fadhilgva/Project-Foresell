@extends('admin_toko.layout.core_store')

<title>Foresell - Data Order Edit</title>

@section('judul')
    Edit Data Order
@endsection

@section('content')
<form action="/admin_toko/data_order/{{$data_order->id}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label>Category Name</label> <br>
    <select name="category_id" class="form-control" id=""  >

     @if (old('category_id') == $data_produk->Category->id || $data_produk->Category->id)
        <option  value="{{$data_produk->Category->id}}">{{$data_produk->Category->name}}</option>

        @foreach ($category as $item)
            <option  value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
     @else
        <option  value="">---Choose Category---</option>

        @foreach ($category as $item)
            <option  value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
     @endif

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
              @if ($item->id === $category->user_id)

                  <option value="{{$item->id}}" selected>{{$item->name}}</option>

              @else

                  <option value="{{$item->id}}">{{$item->name}}</option>

              @endif
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
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ? old('name') : $data_produk->name}}">
  </div>
  @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <div class="form-group">
      <label>Slug Name</label>
      <input type="text" id="slug" name="slug" class="form-control" value="{{old('slug') ? old('slug') : $data_produk->slug}}">
  </div>
  @error('slug')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <div class="form-group">
    <label>Product Price</label>
    <input type="text" name="price" class="form-control" value="{{old('price') ? old('price') :$data_produk->price}}">
  </div>
  @error('price')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <div class="form-group">
    <label>Product Stock</label>
    <input type="text" name="stock" class="form-control" value="{{ old('stock') ? old('stock') : $data_produk->stock}}">
  </div>
  @error('stock')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror


   <div class="form-group">
    <label>Product Sold</label>
    <input type="text" name="sold" class="form-control" value="{{old('sold') ? old('sold') : $data_produk->sold}}">
  </div>
  @error('sold')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <div class="form-group">
    <label>Product Discount</label>
    <input type="text" name="discount" class="form-control" value="{{old('discount') ? old('discount') : $data_produk->discount}}">
  </div>
  @error('discount')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <div class="form-group">
    <label for="editor">Product Description</label>
    <textarea name="desc" class="form-control" id="editor" cols="30" rows="10">{{old('desc') ? old('desc') : $data_produk->desc}}</textarea>
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