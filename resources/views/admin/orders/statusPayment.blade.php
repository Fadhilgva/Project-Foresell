@extends('sb-admin.app')
@section('title', 'Payment Status')
@section('payment', 'active')
@section('orders', 'show')
@section('orders-active', 'active')


@section('content')

<h4 class="text-grey">Transaksi</h4>

{{-- tables
    @if (1 == 1)
        <table class="mt-4 table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Product Name</th>
                <th scope="col">Toko</th>
                <th scope="col">Ship Address</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++)  
                    <tr>
   
                        <td>{{ $row->customer->ContactName}}</td>
                        <td>Product</td>
                        <td>{{ $row->ShipVia }}</td> 

                        <th scope="row">{{ $i }}</th>
                        <td>Samuel</td>
                        <td>0812332893</td>
                        <td>Milk</td>
                        <td>Dora Store</td>
                        <td>Jl. Kebagusan</td>
                        <td>
                            @php
                                $statusOrder = 1;
                            @endphp
                            @if ($statusOrder == 0)
                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-uncheck"></i>Sudah Bayar</a>
                            @else
                                <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-uncheck"></i>Belum Bayar</a>
                            @endif
                      
                        </td>
                    </tr>
                @endfor
                @for ($i = 6; $i <= 10; $i++)  
                    <tr>
        
                        <th scope="row">{{ $i }}</th>
                        <td>Samuel</td>
                        <td>0812332893</td>
                        <td>Milk</td>
                        <td>Dora Store</td>
                        <td>Jl. Kebagusan</td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-uncheck"></i>Sudah Bayar</a>
                        </td>
                        
                    </tr>
                @endfor
            </tbody>
     <div class="d-flex justify-content-center mt-2">{{ $orders->links() }} </div>  
    @else
        <div class="mt-4 alert alert-info" role="alert">
            Anda belum memiliki Post
        </div>
    @endif --}}

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <p>
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
     
                        <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i> Filter</a>

                    </p>
                </div>
                <div class="box-body">
                   
                    <div class="table-responsive">
                        <table class="table table-hover myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>customer</th>
                                    <th>paket</th>
                                    <th>status pesanan</th>
                                    <th>status pembayaran</th>
                                    <th>berat</th>
                                    <th>Grand Total</th>
                                    <th>cetak invoice</th>
                                    <th>created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td>
                                        <div style="width:60px">
                                            <a href="#" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
     
                                            <button href="#" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </td>
                                    <td>John</td>
                                    <td>7772344123</td>
                                    <td>Packing</td>
                                    <td>
                                        <form action="" method="post">
                                            <button class="btn btn-secondary btn-sm">Belum dibayar</button>
                                        </form>
                                    </td>
                                    <td>1 Kg</td>
                                    <td>Rp. 30000</td>
                                    <td>
                                        <div style="width:60px">
                                            <a href="#" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-print"></i></a>
                                        </div>
                                    </td>
                                    <td>{{ date('d F Y')}}</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
     
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-default modal-dialog-centered " role="document">
          <div class="modal-content">
   
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
   
            <div class="modal-body">
   
              <form role="form" action="#" method="get">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dari Tanggal</label>
                    <input type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Dari Tanggal" name="dari" autocomplete="off" value="{{ date('Y-m-d') }}">
                  </div>
   
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sampai tanggal</label>
                    <input type="text" class="form-control datepicker" name="sampai" id="exampleInputPassword1" placeholder="dari tanggal" autocomplete="off" value="{{ date('Y-m-d') }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Status Bayar</label>
                    <select class="form-control" name="status_bayar">
                      <option value="all" selected>All Status</option>
                      <option value="4" >Belum Dibayar</option>
                      <option value="3" >Sudah Dibayar</option>
                    </select>
                  </div>
                 
                </div>
                <!-- /.box-body -->
   
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary ml-3 mb-4">Submit</button>
                </div>
              </form>
   
            </div>
        </div>
      </div>
   
   
  <script type="text/javascript">
      $(document).ready(function(){
   
          // btn refresh
          $('.btn-refresh').click(function(e){
              e.preventDefault();
              $('.preloader').fadeIn();
              location.reload();
          })
   
          $('.btn-filter').click(function(e){
              e.preventDefault();
             
              $('#modal-filter').modal();
          })
   
      })
  </script>

@endsection

