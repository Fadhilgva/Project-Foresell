@extends('customer.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto" style="margin-top: 60px; margin-bottom:50px">
            {{-- Order Navigasi --}}
            <div>
                <div class="h2 mb-5 text-center title">Shipping Details</div>
                <ul class="nav nav-tabs nav-fill border-bottom mb-3">
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">1. Shopping cart</a>
                    </li>
                    <li class="mx-auto"></li>
                    <li class="mx-auto">
                        <a class="nav-link title" aria-current="page">2. Shipping Details</a>
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

            {{-- Form --}}
            <div class="row">
                <div class="col-6 my-3">
                    <form action="post">
                        <div class="row g-3">
                            <h5 class="mt-4 mb-2 title">Personal Profile</h5>
                            <div class="col-md-12 my-2">
                                <div class="form-floating-sm">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter your full name" value="Muhammad Fadhil" required>
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                <div class="form-floating-sm">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="Enter your email address" value="muhammadfadhil@if.uai.ac.id" required>
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                <div class="form-floating-sm">
                                    <label for="number">Phone Number</label>
                                    <input type="number" class="form-control form-control-sm" id="number" name="number" placeholder="Enter your phone number" value="081357638723" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6 my-3">
                    <form action="post">
                        <div class="row g-3">
                            <h5 class="mt-4 mb-2 title">Shipping Address</h5>
                            <div class="col-md-6 my-2">
                                <div class="form-floating-sm">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control form-control-sm" id="city" name="city" placeholder="Enter your city" value="DKI Jakarta" required>
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                <div class="form-floating-sm">
                                    <label for="postcode">Post Code</label>
                                    <input type="number" class="form-control form-control-sm" id="postcode" name="postcode" placeholder="Enter your post code" value="13250" required>
                                </div>
                            </div>
                            <div class="col-md-12 my-1">
                                <div class="form-floating-sm">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control form-control-sm" id="address" name="address" placeholder="Enter your address" rows="3"
                                        required>Masjid Agung Al-Azhar, Jl. Sisingamangaraja No.2, RT.2/RW.1, Selong, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12110</textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Navigation --}}
            <div>
                <div class="row align-items-center text-center">
                    <div class="col-md-6 mb-3 mb-md-0 text-md-start">
                        <a class="btn btn-outline-dark" href="/cart"><i class='bx bx-left-arrow-alt'></i>Back</a>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="/billing" class="btn btn-dark" href="/billing">
                            Process payment <i class='bx bx-credit-card-alt'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection