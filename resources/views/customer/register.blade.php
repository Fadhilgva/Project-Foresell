@extends('customer.auth')

@section('container')
<div class="container">
    <div class="row">
        <div class="col text-center sign_up_">
            <img src="{{ asset('img/customer/register.gif') }}" width="500">
        </div>
        <div class="col sign_up">
            <div class="d-flex align-items-center pt-0">
                <div class="container">
                    <div class="d-flex justify-content-end me-lg-5">
                        <a href="/">
                            <img src="{{ asset('img/bx-x.svg') }}" alt="" width="30">
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <h3 class="display-6 title mb-0">Welcome!</h3>
                            <p class="caption-text text-muted mb-3">Please enter the details below to register</p>

                            <form action="/register" method="POST">
                                @csrf
                                <div class="row g-3 mb-4">
                                    <h6 class="mb-0 title">Account Information</h6>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="name" name="name" class="form-control @error('name')
                                            is-invalid
                                            @enderror" id="name" placeholder="Full Name" required value="{{ old('name') }}" />
                                            <label for="name">Full Name</label>
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}" />
                                            <label for="email">Email address</label>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="phone" class="form-control
                                            @error('phone')
                                            is-invalid
                                            @enderror" id="phone" placeholder="08XXXXXXXXXX" required value="{{ old('phone') }}" />
                                            <label for="phone">Phone Number</label>
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="password" name="password" class="form-control
                                            @error('password')
                                            is-invalid
                                            @enderror" id="password" placeholder="name@example.com" required value="" />
                                            <label for="password">Password</label>
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="08XXXXXXXXXX" required value="" />
                                            <label for="confirm_password">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row g-3">
                                    <h6 class="mb-0 title">Shipping Details</h6>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="address" class="form-control" id="address" placeholder="08XXXXXXXXXX" required value="" />
                                            <label for="address">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" name="city" class="form-control" id="city" placeholder="DKI Jakarta" required value="" />
                                            <label for="city">City</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="number" name="postalcode" class="form-control" id="postalcode" placeholder="13XXX" required value="" />
                                            <label for="postalcode">Postal Code</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row align-items-center mt-4">
                                    <button type="submit" class="btn btn-dark login mx-auto">Create Your Account
                                    </button>
                                </div>
                            </form>
                            <p class="text-center small mt-2">
                                Already have an account?
                                <a class="fw-bold text-decoration-none text-dark" href="/login">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection