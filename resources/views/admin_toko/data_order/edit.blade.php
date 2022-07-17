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


  <div class="form-group">
      <label>Status Pembayaran</label>
      <input type="text" id="status" name="name" class="form-control" value="{{ old('name') ? old('name') : $orders->status}}">
  </div>
  @error('status')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror


@endsection