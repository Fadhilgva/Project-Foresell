@extends('customer.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto" style="margin-top: 60px; margin-bottom:50px">
            {{-- Order Navigasi --}}
            <div>
                <div class="h2 mb-5 text-center title">Shopping cart</div>
                <ul class="nav nav-tabs nav-fill border-bottom mb-4">
                    <li class="mx-auto">
                        <a class="nav-link title" aria-current="page">1. Shopping cart</a>
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
                        <a class="nav-link disabled" aria-current="page">3. Completed</a>
                    </li>
                </ul>
            </div>

            {{-- Cart --}}
            <div class="row">
                <div class="col-lg-9 my-3">
                    <div class="table-responsive mb-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-0 p-3 h6 title" scope="col">
                                        Product
                                    </th>
                                    <th class="border-0 p-3 h6 title" scope="col">
                                        Price
                                    </th>
                                    <th class="border-0 p-3 h6 title" scope="col">
                                        Quantity
                                    </th>
                                    <th class="border-0 p-3 ps-4 h6 title" scope="col">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @for ($i = 0; $i < 1; $i++) <tr>
                                    <td class="p-3 border-0">
                                        <div class="d-flex align-items-center">
                                            <a class="reset-anchor d-block animsition-link" href="/product"><img src="{{ asset('img/customer/img-1.png') }}" alt="" width="70" /></a>
                                            <div class="ms-3">
                                                <a class="reset-anchor animsition-link title text-decoration-none" href="/product">Asus TUF Dash F15</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3 align-middle border-0">
                                        <p class="mb-0 small">Rp{{ $a=18600000 }}</p>
                                    </td>
                                    <td class="p-3 align-middle border-0">
                                        <div class="quantity p-1">
                                            <button class="dec-btn p-1">
                                                <i class='bx bx-minus'></i>
                                            </button>
                                            <input class="form-control border-0 shadow-sm-0 p-0 quantity" type="number" value="{{ $b=2 }}" min="1" max="100" name="quantity" />
                                            <button class="inc-btn p-1">
                                                <i class='bx bx-plus'></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="p-3 align-middle border-0">
                                        <p class="mb-0 small">Rp{{ $a *= $b }}</p>
                                    </td>
                                    <td class="p-3 align-middle border-0">
                                        <a class="reset-anchor" href="">
                                            <img src="{{ asset('img/customer/bx-trash.svg') }}" width="20">
                                        </a>
                                    </td>
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card border rounded p-lg-1 bg-light">
                        <div class="card-body">
                            <h5 class="mb-4">Cart total</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center justify-content-between">
                                    <strong class="small font-weight-bold">Subtotal
                                    </strong>
                                    <span class="text-muted small">Rp{{ $a }}
                                    </span>
                                </li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mb-4">
                                    <strong class="small font-weight-bold">Total
                                    </strong>
                                    <span>Rp{{ $a }}
                                    </span>
                                </li>
                                {{-- <li>
                                    <form action="#">
                                        <div class="input-group mb-0">
                                            <input class="form-control" type="text" placeholder="Enter your coupon" />
                                            <button class="btn btn-dark btn-sm w-100" type="submit"><i class="fas fa-gift me-2"></i>Apply coupon</button>
                                        </div>
                                    </form>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <div class="mt-3">
                <div class="row align-items-center text-center">
                    <div class="col-md-6 mb-3 mb-md-0 text-md-start">
                        <a class="btn btn-outline-dark" href="/products"><i class='bx bx-shopping-bag'></i> Continue shopping</a>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a class="btn btn-dark" href="/shipping">Process checkout <i class='bx bx-basket'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection