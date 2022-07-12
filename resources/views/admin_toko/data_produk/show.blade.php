@extends('admin_toko.layout.core_store')

<title>Foresell - {{$data_produk->name}}</title>

@section('judul')
    Produk Name : {{$data_produk->name}}
@endsection

@section('content')
<div class="card text-center">
    <div class="card-header">
        <img src="/img/admin_store/{{$data_produk->image}}" alt="" width="500" height="500">
    </div>
    <div class="card-body">
      <h5 class="card-title">Category : {{$data_produk->category_id}}</h5>
      <h5 class="card-title">Store : {{$data_produk->store_id}}</h5>
      <p class="card-text">Price : {{$data_produk->price}}</p>
      <p class="card-text">Description : {!! $data_produk->desc !!}</p>
      <p class="card-text">Quantity : {{$data_produk->stock}}</p>
      <p class="card-text">Sold : {{$data_produk->sold}}</p>
      <p class="card-text">Discount : {{$data_produk->discount}}</p>
      <p class="card-text">Stock : {{$data_produk->stock}}</p>
      <a href="/admin_toko/data_produk" class="btn btn-secondary">Back</a>
    </div>

  </div>
@endsection
