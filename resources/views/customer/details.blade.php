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
                                    <h2 class="to title">Muhammad Fadhil</h2>
                                    <div class="email">muhammadfadhil@if.uai.ac.id</div>
                                    <div class="address mt-4">DKI Jakarta, Jalan Raya Bekasi 13250
                                    </div>
                                    <div>Payment Method : BNI Virtual Account</div>
                                    <div>Shipping Courier : J&T Express</div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Order Date: 01/10/2018</div>
                                    <div class="date">Order Finished: 05/10/2018</div>
                                </div>
                            </div>
                            <table class="table table-striped my-5">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="text-left">Product</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('img/customer/img-1.png') }}" width="100">
                                        </td>
                                        <td class="text-left">
                                            <a href="/product" class="text-decoration-none title">Asus TUF Dash F15</a>
                                        </td>
                                        <td class="unit text-center">Rp18600000</td>
                                        <td class="qty">2</td>
                                        <td class="total">Rp37200000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Subtotal</td>
                                        <td>Rp37200000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Total Discount</td>
                                        <td>-Rp0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Grand Total</td>
                                        <td>Rp37200000</td>
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