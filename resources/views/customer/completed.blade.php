@extends('customer.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto" style="margin-top: 60px; margin-bottom:50px">
            {{-- Order Navigasi --}}
            <div>
                <div class="h2 mb-5 text-center title">Completed</div>
                <ul class="nav nav-tabs nav-fill border-bottom mb-4">
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">1. Shopping cart</a>
                    </li>
                    <li class="mx-auto"></li>
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">2. Shipping Details</a>
                    </li>
                    <li class="mx-auto"></li>
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">3. Billing Information</a>
                    </li>
                    <li class="mx-auto"></li>
                    <li class="mx-auto">
                        <a class="nav-link title" aria-current="page">3. Completed</a>
                    </li>
                </ul>
            </div>

            {{-- Order --}}
            <div class="text-center my-5">
                <div class="pt-5 mb-3">
                    <img src="{{ asset('img/customer/check.svg') }}" width="100">
                    {{-- <img src="img/package.svg" width="100"> --}}
                </div>
                <div class="h4 title mb-1">Thank you, Fadhil. Your order is confirmed.</div>
                <div class="fs-6 mt-n1 mb-3">Your order hasn't shipped yet but we will send you ane email when it does.</div>
                <div class="row align-items-center text-center">
                    <div class="col-md-12 mx-auto">
                        <a class="btn btn-dark" href="/orders">View your Order</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection