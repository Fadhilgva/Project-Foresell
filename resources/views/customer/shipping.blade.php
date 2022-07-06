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
            <form action="/editshipping" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="row g-3">
                            <h5 class="mt-4 mb-2 title">Personal Profile</h5>
                            <div class="col-md-12 my-2">
                                <div class="form-floating-sm">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control form-control-sm
                                @error('name')
                                is-invalid
                                @enderror" id="name" name="name" placeholder="Enter your full name" value="{{ old('name', Auth()->user()->name) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                <div class="form-floating-sm">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control form-control-sm
                                @error('email')
                                is-invalid
                                @enderror" id="email" name="email" placeholder="Enter your email address" value="{{ old('email', Auth()->user()->email) }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                <div class="form-floating-sm">
                                    <label for="phone">Phone Number</label>
                                    <input type="phone" class="form-control form-control-sm
                                @error('phone')
                                is-invalid
                                @enderror" id="phone" name="phone" placeholder="Enter your phone phone" value="{{ old('phone', Auth()->user()->phone) }}" required>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="row g-3">
                            <h5 class="mt-4 mb-2 title">Shipping Address</h5>
                            <div class="col-md-6 my-2">
                                <div class="form-floating-sm">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control form-control-sm
                                @error('city')
                                is-invalid
                                @enderror" id="city" name="city" placeholder="Enter your city" value="{{ old('city' , Auth()->user()->city) }}" required>
                                    @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                <div class="form-floating-sm">
                                    <label for="postalcode">Post Code</label>
                                    <input type="text" class="form-control form-control-sm
                                @error('postalcode')
                                is-invalid
                                @enderror" id="postalcode" name="postalcode" placeholder="Enter your post code" value="{{ old('postalcode', Auth()->user()->postalcode) }}" required>
                                    @error('postalcode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 my-1">
                                <div class="form-floating-sm">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control form-control-sm
                                @error('address')
                                is-invalid
                                @enderror" id="address" name="address" placeholder="Enter your address" rows="3" required>{{ old('address', Auth()->user()->address) }}</textarea>
                                    @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Navigation --}}
                <div>
                    <div class="row align-items-center text-center">
                        <div class="col-md-6 mb-3 mb-md-0 text-md-start mt-3">
                            <a class="btn btn-outline-dark" href="/cart"><i class='bx bx-left-arrow-alt'></i>Back</a>
                        </div>
                        <div class="col-md-6 text-md-end mt-3">
                            <button class="btn btn-dark" type="submit">
                                Process payment <i class='bx bx-credit-card-alt'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection