@extends('admin_toko.layout.core_store')

<title>Foresell - Process Payment</title>

@section('judul')
Process Payment
@endsection

@section('content')
<div class="container-fluid">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Order</h6>
    </div>
    <div class="card-body">
        <label>Kode Invoice: </label><br>
        <textarea name="kode" class="form-control" id="" cols="190" rows="1"></textarea><br><br>

    </div>
    <a href="/admin_toko/data_order/create" class="btn btn-primary my-2">Mencari</a>



</div>
@endsection