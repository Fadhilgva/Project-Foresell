@extends('admin_toko.layout.core_store')

<title>Foresell - Data Order</title>

@section('judul')
    Data Order
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Order Kode : INV/2022-000002</h6>
        </div>
        <div class="card-body">
            <p>Invoice&emsp13;: INV/2022-000002</p>
            <p>Nama Pelanggan&emsp13;: Bang Fadil</p>
            <p>Payment Method&emsp13;: Gopay</p>
            <p>Shipping Courier&emsp13;: JNE Express</p>
            <p>Nama Toko&emsp13;: Toko A</p>
            <p>Tanggal Pesan&emsp13;: 2022/06/30</p>
            
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Produk</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        <th>Total Discount</th>
                        <th>Grand Total</th>
                    </tr>
                </thead>
                <tr>
                    <th>1</th>
                    <th>Yogurt</th>
                    <th>5</th>
                    <th>Rp 120.000</th>
                    <th>20%</th>
                    <th>Rp 96.000</th>
                </tr>
                <tbody>

                </tbody>
            </table>

            <a href="#" class="btn btn-warning btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                <span class="text">Cetak Invoice</span>
            </a>

            <a href="#" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">Selesaikan Pesanan</span>
            </a>


        </div>
    </div>

</div>
@endsection