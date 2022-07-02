@extends('sb-admin.app')
@section('title', 'ship Status')
@section('ship', 'active')
@section('orders', 'show')
@section('orders-active', 'active')


@section('content')

<h1 class="text-grey">Ship Status</h1>


{{-- tables --}}
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
                {{-- <th scope="col"></th>
                <th scope="col">Slug</th>
                <th scope="col">Aksi</th> --}}
            </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++)  
                    <tr>
                        {{-- <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->customer->ContactName}}</td>
                        <td>Product</td>
                        <td>{{ $row->ShipVia }}</td> --}}

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
                                <a href="#" class="btn btn-success btn-sm"><i class="fa fa-uncheck"></i>Pesanan sudah diterima</a>
                            @else
                                <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-uncheck"></i>Pesanan belum diterima</a>
                            @endif
                            {{-- <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-uncheck"></i>Belum Bayar</a> --}}
                        </td>
                    </tr>
                @endfor
                @for ($i = 6; $i <= 10; $i++)  
                    <tr>
                        {{-- <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->customer->ContactName}}</td>
                        <td>Product</td>
                        <td>{{ $row->ShipVia }}</td> --}}

                        <th scope="row">{{ $i }}</th>
                        <td>Samuel</td>
                        <td>0812332893</td>
                        <td>Milk</td>
                        <td>Dora Store</td>
                        <td>Jl. Kebagusan</td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-uncheck"></i>Pesanan sudah diterima</a>
                        </td>
                        
                    </tr>
                @endfor
            </tbody>
        </table>
    {{-- <div class="d-flex justify-content-center mt-2">{{ $orders->links() }} </div>  --}}
    @else
        <div class="mt-4 alert alert-info" role="alert">
            Anda belum memiliki Post
        </div>
    @endif

@endsection