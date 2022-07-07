@extends('customer.auth')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col text-center sign_up_">
                <img src="{{ asset('img/customer/adminregister.gif') }}" width="500">
            </div>
            <div class="col sign_up">
                <div class="d-flex align-items-center pt-0">
                    <div class="container">
                        <div class="d-flex justify-content-end me-lg-5">
                            <a href="/">
                                <img src="{{ asset('img/customer/bx-x.svg') }}" alt="" width="30">
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <h3 class="display-6 title mb-0">Register Store</h3>
                                <p class="caption-text text-muted mb-3">Please enter the details below to register your
                                    store</p>

                                <form action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3 mb-4">
                                        <h6 class="mb-0 title">Account Information</h6>

                                        {{-- NAME TENANT --}}
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="name" name="name"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    placeholder="Full Name" required value="{{ old('name') }}" />
                                                <label for="name">Full Name</label>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- STORE NAME --}}
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <input type="name" name="storeName"
                                                    class="form-control @error('storeName') is-invalid @enderror"
                                                    id="storeName" placeholder="Store Name" required
                                                    value="{{ old('storeName') }}" />
                                                <label for="storeName">Store Name</label>
                                                @error('storeName')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- ADDRESS --}}
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" name="address"
                                                    class="form-control
                                            @error('address') is-invalid @enderror"
                                                    id="address" placeholder="name@example.com" required value="" />
                                                <label for="address">Address</label>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- CITY --}}
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="name" name="city"
                                                    class="form-control @error('city') is-invalid @enderror" id="city"
                                                    placeholder="Store Name" required value="{{ old('city') }}" />
                                                <label for="city">City</label>
                                                @error('city')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- POSTAL CODE--}}
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="name" name="postalcode"
                                                    class="form-control @error('postalcode') is-invalid @enderror" id="postalcode"
                                                    placeholder="Store Name" required value="{{ old('postalcode') }}" />
                                                <label for="postalcode">Postal Code</label>
                                                @error('postalcode')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- PHONE --}}
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" name="phone"
                                                    class="form-control
                                            @error('phone') is-invalid @enderror"
                                                    id="phone" placeholder="08XXXXXXXXXX" required
                                                    value="{{ old('phone') }}" />
                                                <label for="phone">Phone Number</label>
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- logo --}}
                                        <div class="col-12">
                                            <div class="">
                                                <input type="file" class="form-control" id="logo" name="logo">
                                                <label for="logo" class="d-flex justify-content-end"><small>Store Logo</small></label>
                                                @error('logo')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- EMAIL --}}
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="email" name="email"
                                                    class="form-control
                                            @error('email') is-invalid @enderror"
                                                    id="email" placeholder="name@example.com" required
                                                    value="{{ old('email') }}" />
                                                <label for="email">Email address</label>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Password --}}
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="password" name="password"
                                                    class="form-control
                                            @error('password') is-invalid @enderror"
                                                    id="password" placeholder="name@example.com" required value="" />
                                                <label for="password">Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- CONFIRM PASSWORD --}}
                                        <div class="col-6">
                                            <div class="form-floating">
                                                <input type="password" name="confirm_password" class="form-control"
                                                    id="confirm_password" placeholder="08XXXXXXXXXX" required
                                                    value="" />
                                                <label for="confirm_password">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <button type="submit" class="btn btn-dark login mx-auto">Create Your Account
                                </button>
                            </div>
                            </form>
                            <p class="text-center small mt-2">
                                Already have an account?
                                <a class="fw-bold text-decoration-none text-dark" href="/admin_toko/login_store">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
