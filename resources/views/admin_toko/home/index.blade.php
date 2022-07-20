@extends('admin_toko.layout.core_store')

<title>Foresell - Home</title>

@section('judul')
@foreach ($store as $store)
<p class="ms-4 title">{{ $store->name }}</p>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ number_format($valueMonth, 0,",",".") }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ number_format($valueYear, 0,",",".") }}</div>
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
                            <th>Customer</th>
                            <th>Total Price</th>
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
                            <td>Rp{{ number_format($order->total, 0,",",".") }}</td>
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
                <a href="/admin_toko/data_order" class="btn bg-primary text-white font-weight-bold">View All Orders</a>
            </div>
        </div>
    </div>
</div>
@endsection