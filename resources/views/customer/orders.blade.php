@extends('customer.main')

@section('container')
<div class="container my-5 px-4">
    <div class="h3 mb-3 title">Your Orders</div>
    @if($orders->count()>0)
    <div class="h3 mb-3 title"></div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-md-12 shadow">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white">
                    <table class="table manage-candidates-top mb-0 rounded">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr class="candidates-list shadow-sm">
                                <div class="row">
                                    <td class="align-items-center">
                                        <p class="title mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="align-items-center p-5">
                                        <p class="title mb-0">Total</p>
                                        <span>Rp{{ $order->total }}</span>
                                    </td>
                                    <td class="align-items-center p-5">
                                        <p class="title mb-0 small">Total Discount</p>
                                        <span class="small">-Rp{{ $order->total_disc }}</span>
                                    </td>
                                    <td class="align-items-center">
                                        @switch($order->status)
                                        @case($order->status == "Waiting")
                                        <p class="badge text-bg-danger mt-4">Waiting for Payment</p>
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
                                    <div>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </div>
                                    <div>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </div>
                                    <td class="align-items-center">
                                        <a href="/orderdetails/{{ $order->id }}" class="btn btn-dark btn-sm">View Detail
                                            <i class='bx bx-chevron-right'></i>
                                        </a>
                                    </td>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @else
    <p class="text-center fs-4 title noproduct mt-3">No Orders found</p>
    @endif
</div>
@endsection