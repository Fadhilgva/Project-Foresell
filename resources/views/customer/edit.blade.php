@extends('customer.main')

@section('container')
<div class="container rounded shadow-sm p-3 my-5 border">
    <form action="/edit/profile" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-2 mt-3">
                <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle my-0" width="150px" src="https://source.unsplash.com/150x150?technology">
                </div>
            </div>
            <div class="col-md-5 mt-3">
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
            <div class="col-md-5 mt-3">
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
        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-dark">Save Profile</button>
        </div>
    </form>
</div>
@endsection