@extends('admin_toko.layout.core_store')

<title>Foresell - Data Penjualan</title>

@section('judul')
    Data Penjualan
@endsection

@section('content')
<!-- Content Row -->
<div class="container-fluid">

    <div class="container-fluid">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
                Styling for the area chart can be found in the
                <code>/js/demo/chart-area-demo.js</code> file.
            </div>
            
        </div>
        <a href="#" class="btn btn-primary btn-icon-split btn-lg">
            <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
            </span>
            <span class="text">Cetak Data</span>
        </a>
    </div>

    <!-- Donut Chart -->
    

@endsection