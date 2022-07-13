@extends('admin_toko.layout.core_store')

<title>Foresell - Home</title>

@section('judul')
@foreach ($store as $store)
<p class="ms-2 title">{{ $store->name }}</p>
@endforeach
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Orders
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $orders }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Processed Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ordersprocess }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Monthly Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ $valueMonth }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Annual Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ $valueYear }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Your Store Orders</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th></th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderstore->take(10) as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('img/customer/img-1.png') }}" width="40" alt="{{ $order->Product->name }}">
                            </td>
                            <td>{{ $order->Product->name }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->qty }}</td>
                            <td>{{ $order->discount }} %</td>
                            <td>
                                @if($order->status = "Processed")
                                <p class="badge text-bg-primary">Processed</p>
                                @elseif($order->status = "Shipping")
                                <p class="badge text-bg-warning">Shipping</p>
                                @else
                                <p class="badge text-bg-success">Finished</p>
                                @endif
                            </td>
                            <td>{{ $order->created_at->toDateTimeString() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/halaman-orders" class="btn bg-primary text-white font-weight-bold">View All Orders</a>
            </div>
        </div>
    </div>
</div>
@endsection