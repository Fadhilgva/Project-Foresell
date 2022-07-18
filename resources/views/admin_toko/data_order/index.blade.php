@extends('admin_toko.layout.core_store')

<title>Foresell - Data Order</title>

@section('judul')
<p class="ms-4 title">Orders</p>
@endsection

@push('script')
<script src="{{asset('/vendor/admin_store/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/vendor/admin_store/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
    $("#example1").DataTable();
  });

  $('#example1').DataTable({
        "order": [[5, "desc"]]
    });
</script>
@endpush

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Total Price (Rupiah)</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderstore->take(10) as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ number_format($order->total, 0,",",".") }}</td>
                    <td>{{ $order->Bank->name }}</td>
                    <td>
                        @switch($order->status)
                        @case($order->status == "Waiting")
                        <p class="badge text-bg-danger">Waiting for Payment</p>
                        @break
                        @case($order->status == "Already")
                        <p class="badge text-bg-secondary">Already Payment</p>
                        <form action="/orders/{{ $order->id }}/update" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="Processed">
                            <button type="submit" class="btn btn-dark btn-sm">Processed</button>
                        </form>
                        @break
                        @case($order->status == "Processed")
                        <p class="badge text-bg-primary">Processed</p>
                        <form action="/orders/{{ $order->id }}/update" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="Shipping">
                            <button type="submit" class="btn btn-dark btn-sm">Shipping</button>
                        </form>
                        @break
                        @case($order->status == "Shipping")
                        <p class="badge text-bg-warning">Shipping</p>
                        @break
                        @case($order->status == "Finished")
                        <p class="badge text-bg-success">Finished</p>
                        @break
                        @endswitch
                    </td>
                    <td>{{ $order->created_at->toDateTimeString() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

                

            



        </table>
    </div>
</div>
@endsection