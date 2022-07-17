@extends('customer.main')

@section('container')
<div class="container my-5 px-4">
    <div class="card border shadow-sm">
        <div class="card-body">
            <div id="invoice">
                <div class="invoice overflow-auto">
                    <div>
                        <header>
                            <div class="col">
                                <div class="row mt-0">
                                    <div>
                                        <img src="{{ asset('img/customer/foresell.png') }}" width="200" alt="">
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div>Masjid Agung Al-Azhar, Jl. Sisingamangaraja No.2</div>
                                    <div>(0821) 5745-2789</div>
                                    <div>foresell@gmail.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <h2 class="to title">{{ $orders->name }}</h2>
                                    <div class="email">{{ $orders->email }}</div>
                                    <div class="address mt-4">{{ $orders->address }}</div>
                                    <div class="my-3"></div>
                                    <div>Payment Method : {{ $orders->Bank->bankName }}</div>
                                    <div>Shipping Courier : {{ $orders->Courier->name }}</div>
                                </div>
                                <div class="col invoice-details">
                                    <h2 class="invoice-id">INVOICE
                                        {{ date_format($orders->created_at, 'Y'). '-'
                                        .sprintf("%02d", Auth::user()->id). '-'
                                        .sprintf("%02d", $orders->id) }}
                                    </h2>
                                    <div class="date">Order Date: {{ $orders->created_at->toDateTimeString() }}</div>
                                </div>
                            </div>
                            <table class="table table-striped my-5">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-center fw-bold">Product</th>
                                        <th class="text-center fw-bold">Price</th>
                                        <th class="text-center fw-bold">Quantity</th>
                                        <th class="text-center fw-bold">Discount</th>
                                        <th class="text-center fw-bold">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderdetails as $detail)
                                    <tr>
                                        <td></td>
                                        <td class="text-left">
                                            <p class="title">{{ $detail->Product->name }}</p>
                                        </td>
                                        <td class="text-center">Rp{{ number_format($detail->price, 0,",",".") }}</td>
                                        <td class="qty">{{ $detail->qty}}</td>
                                        <td class="qty">{{ number_format($detail->discount, 0,",",".")}} %</td>
                                        <td class="total">Rp{{ number_format(($detail->price * $detail->qty), 0,",",".") }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="me-0">
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="3">Total Discount</td>
                                        <td>-Rp{{ number_format($orders->total_disc, 0,",",".") }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="3">Grand Total</td>
                                        <td>Rp{{ number_format($orders->total, 0,",",".") }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </main>
                        <footer>Foresell Copyright</footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection