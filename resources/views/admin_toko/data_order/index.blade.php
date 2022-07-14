@extends('admin_toko.layout.core_store')

<title>Foresell - Data Order</title>

@section('judul')
<p class="ms-4 title">Data Order</p>
@endsection

@push('script')
<script src="{{asset('/vendor/admin_store/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/vendor/admin_store/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function () {
    $("#example1").DataTable();
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
                    <th scope="col">No</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Nama Toko</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Jenis Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Nama Toko</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Jenis Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal Pesan</th>
                    <th scope="col">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse ($orderstore as $item)
                <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td><h2 class="invoice-id">INVOICE
                                {{ date_format($orders->created_at, 'Y'). '-'
                                .sprintf("%02d", Auth::user()->id). '-'
                                .sprintf("%02d", $orders->id) }}
                            </h2></td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $ordersprocess->price }}</td>
                            <td>{{ $orders->bank_id }}</td>
                            <td>{{ $orders->status }}</td>
                            <td>{{ $orderstore->created_at }}</td>
                            <td>
                                @switch($order->status)
                                @case($order->status == "Waiting")
                                <p class="badge text-bg-danger mt-4">Waiting for Payment</p>
                                @break
                                @case($order->status == "Already")
                                <p class="badge text-bg-secondary mt-4">Already Payment</p>
                                @break
                                @case($order->status == "Processed")
                                <p class="badge text-bg-primary mt-4">Processed</p>
                                @break
                                @case($order->status == "Shipping")
                                <p class="badge text-bg-warning mt-4">Shipping</p>
                                <a href="/orders/{{ $order->id }}/confirm" class="btn btn-success btn-sm ms-5">Confirm Order</a>
                                @break
                                @case($order->status == "Finished")
                                <p class="badge text-bg-success mt-4">Finished</p>
                                @break
                                @endswitch
                            </td>
                            {{-- <td>{{ $order->created_at->toDateTimeString() }}</td> --}}
                            <td>
                                <form action="/admin_toko/data_order/{{$item->id}}" method="POST">
                                    <a type="button" class="btn btn-warning mb-3" href="/admin_toko/data_order/{{$item->id}}/edit">Edit</a>
        
                                    @csrf
                                    @method('delete')
        
                                    <a href="/admin_toko/data_order/{{ $item->id }}/confirm" class="btn btn-danger mb-3" id="delete">Delete</a>
                                </form>
                            </td>
                </tr>

                @empty
                
                @endforelse

            </tbody>



        </table>
    </div>
</div>
@endsection