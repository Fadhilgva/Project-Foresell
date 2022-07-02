@extends('admin_toko.layout.core_store')

<title>Foresell - Data Order</title>

@section('judul')
    Data Order
@endsection

@push('script')
<script src="{{asset('admin_store/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin_store/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush
    
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    
@endpush

@section('content')
<div class="container-fluid">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Costumer</th>
                <th>Invoice</th>
                <th>Nama Toko</th>
                <th>Total Harga</th>
                <th>Jenis Pembayaran</th>
                <th>Status</th>
                <th>Tanggal Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Costumer</th>
                <th>Invoice</th>
                <th>Nama Toko</th>
                <th>Total Harga</th>
                <th>Jenis Pembayaran</th>
                <th>Status</th>
                <th>Tanggal Pesan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>1</td>
                <td> Fadil</td>
                <td>INV/2022-000001</td>
                <td>Toko A</td>
                <td>Rp 240.000</td>
                <td>Transfer</td>
                <td><a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Finished</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>2</td>
                <td> Yazid</td>
                <td>INV/2022-000002</td>
                <td>Toko A</td>
                <td>Rp 24.000</td>
                <td>Tunai</td>
                <td><a href="#" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">In the Process</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>3</td>
                <td> Azzam</td>
                <td>INV/2022-000003</td>
                <td>Toko A</td>
                <td>Rp 324.000</td>
                <td>Tunai</td>
                <td><a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Finished</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>4</td>
                <td> Fadil</td>
                <td>INV/2022-000004</td>
                <td>Toko A</td>
                <td>Rp 254.000</td>
                <td>Tunai</td>
                <td><a href="#" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">In the Process</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>5</td>
                <td> Yazid</td>
                <td>INV/2022-000005</td>
                <td>Toko A</td>
                <td>Rp 204.000</td>
                <td>Transfer</td>
                <td><a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Finished</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>6</td>
                <td> Azzam</td>
                <td>INV/2022-000006</td>
                <td>Toko A</td>
                <td>Rp 241.000</td>
                <td>Tunai</td>
                <td><a href="#" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">In the Process</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>7</td>
                <td> Fadil</td>
                <td>INV/2022-000007</td>
                <td>Toko A</td>
                <td>Rp 234.000</td>
                <td>Transfer</td>
                <td><a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Finished</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>8</td>
                <td> Yazid</td>
                <td>INV/2022-000008</td>
                <td>Toko A</td>
                <td>Rp 24.000</td>
                <td>Tunai</td>
                <td><a href="#" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">In the Process</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>9</td>
                <td> Azzam</td>
                <td>INV/2022-000009</td>
                <td>Toko A</td>
                <td>Rp 204.000</td>
                <td>Tunai</td>
                <td><a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Finished</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
            <tr>
                <td>10</td>
                <td> Fadil</td>
                <td>INV/2022-000010</td>
                <td>Toko A</td>
                <td>Rp 124.000</td>
                <td>Transfer</td>
                <td><a href="#" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">In the Process</span>
                </a></td>
                <td>2022/06/30</td>
                <td><a href="/admin_toko/data_order/create" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-info-circle"></i>
                    </span>
                    <span class="text">View Detail</span>
                </a></td>
            </tr>
        </tbody>
  
        
  
      </table>
    </div>
  </div>

@endsection