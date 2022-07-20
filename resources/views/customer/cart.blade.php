@extends('customer.main')

@section('container')
<div class="container">
    <div class="row">
        @if ($carts->count() > 0)
        <div class="col-lg-10 mx-auto" style="margin-top: 60px; margin-bottom:50px">
            {{-- Order Navigasi --}}
            <div>
                <div class="h2 mb-5 text-center title">Shopping Cart</div>
                <ul class="nav nav-tabs nav-fill border-bottom mb-4">
                    <li class="mx-auto">
                        <a class="nav-link title" aria-current="page">1. Shopping Cart</a>
                    </li>
                    <li class="mx-auto"></li>
                    {{-- <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">2. Shipping Details</a>
                    </li>--}}
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">2. Billing Information</a>
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
                        @foreach ($carts as $cart => $items)
                        @foreach ($carts_->take(1) as $car => $items)
                        <h5>
                            <a href="/stores?store={{ $car }}" class="text-decoration-none title">{{ $cart }}
                            </a>
                        </h5>
                        @endforeach
                        {{-- TABLE --}}
                        <table class="table">
                            {{-- HEAD --}}
                            <thead>
                                <tr>
                                    <th class="border-0 p-3 h6 title" scope="col">
                                        Product
                                    </th>
                                    <th class="border-0 p-3 h6 title" scope="col">
                                        Price
                                    </th>
                                    <th class="border-0 p-3 h6 title ps-5" scope="col">
                                        Quantity
                                    </th>
                                    <th class="border-0 p-3 ps-4 h6 title" scope="col">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            {{-- CONTENT --}}
                            <tbody class="border-0">
                                @foreach ($items as $cart)
                                <tr>
                                    <td class="p-3 border-0">
                                        <div class="d-flex align-items-center">
                                            <a class="reset-anchor d-block animsition-link" href="/products/{{ $cart->product->slug }}">
                                                @if ($cart->product->image)
                                                <img src="img/admin_store/{{ $cart->product->image }}" width="70" />
                                                @else
                                                <img src="{{ asset('img/customer/img-1.png') }}" width="70" />
                                                @endif
                                            </a>
                                            <div class="ms-3">
                                                <a class="reset-anchor animsition-link title text-decoration-none" href="/products/{{ $cart->product->slug }}">{{ $cart->product->name }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3 align-middle border-0">
                                        <p class="mb-0 small">
                                            Rp{{ number_format($cart->product->price * ((100 - $cart->product->discount) / 100), 0, ',', '.') }}
                                        </p>
                                    </td>
                                    <td class="p-3 align-middle border-0">
                                        <form action="/update_cart" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-5">
                                                    <input type="hidden" name="cart" value="{{ $cart->id }}">
                                                    <input type="number" name="quantity" value="{{ $cart->qty }}" class="w-100 ms-5" min="0" max="{{ $cart->product->stock }}">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-dark ms-5    mt-2" style="margin-right:20px">Update</button>
                                        </form>
                                    </td>
                                    <td class="p-3 align-middle border-0">
                                        <p class="mb-0 small">
                                            Rp{{ number_format($cart->total_product, 0, ',', '.') }}</p>
                                    </td>
                                    <td class="p-3 align-middle border-0">
                                        <form action="/delete_cart" method="post">
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{ $cart->id }}">
                                            <a class="reset-anchor">
                                                <button type="submit" class="btn btn-link">
                                                    <img src="{{ asset('img/customer/bx-trash.svg') }}" width="20">
                                                </button>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        {{-- TOTAL --}}
                        {{-- <div>
                            <h6 class="text-md-end">Total :
                                Rp{{ number_format($items->sum('total_product'), 0, ',', '.') }}</h6>
                        </div> --}}
                        {{-- SHIPPING --}}
                        <div class="text-md-end my-3">
                            <a class="btn btn-dark" href="/shipping/{{ $cart->store_id }}"> Checkout <i class='bx bx-basket'> </i> </a>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-3 my-3">
                    <div class="card border rounded p-lg-1 bg-light">
                        <div class="card-body">
                            <h5 class="mb-4 fw-bold text-center">Cart total</h5>
                            @foreach ($carts as $cart => $items)
                            <h5>{{ $cart }}</h5>
                            <ul class="list-unstyled mt-2">
                                <li class="d-flex align-items-center justify-content-between mt-3 mb-1">
                                    <strong class="small font-weight-bold">Discount
                                    </strong>
                                    <span> Rp{{ number_format($items->sum('discount'), 0, ',', '.') }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between mb-3">
                                    <strong class="small font-weight-bold">Total
                                    </strong>
                                    <span>Rp{{ number_format($items->sum('total_product'), 0, ',', '.') }}
                                    </span>
                                </li>
                            </ul>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <div class="">
                <div class="row align-items-center text-center">
                    <div class="col-md-6 mb-3 mb-md-0 text-md-start">
                        <a class="btn btn-outline-dark" href="/products"><i class='bx bx-shopping-bag'></i> Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-10 mx-auto" style="margin-top: 60px; margin-bottom:50px">
            {{-- Order Navigasi --}}
            <div>
                <div class="h2 mb-5 text-center title">Shopping cart</div>
                <ul class="nav nav-tabs nav-fill border-bottom mb-4">
                    <li class="mx-auto">
                        <a class="nav-link title" aria-current="page">1. Shopping cart</a>
                    </li>
                    <li class="mx-auto"></li>
                    {{-- <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">2. Shipping Details</a>
                    </li> --}}
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">2. Billing Information</a>
                    </li>
                    <li class="mx-auto"></li>
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">3. Completed</a>
                    </li>
                </ul>
            </div>

            {{-- Cart --}}
            <div class="row">
                <p class="text-center fs-4 title noproduct mt-3">No Product found</p>
            </div>

            {{-- Navigation --}}
            <div class="mt-3">
                <div class="row align-items-center text-center">
                    <div class="col-md-6 mb-3 mb-md-0 text-md-start">
                        <a class="btn btn-outline-dark" href="/products"><i class='bx bx-shopping-bag'></i> Back
                            to Products</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection