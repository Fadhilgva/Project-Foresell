@extends('customer.main')

@section('container')

<div class="container rounded shadow-sm p-3 my-4 border">
    @if (session()->has('updateprofile'))
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto col-4" role="alert">
        <small>{{ session('updateprofile') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
                        <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Enter your full name" value="{{ Auth()->user()->name }}" readonly>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-floating-sm">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Enter your email address" value="{{ Auth()->user()->email }}" readonly>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-floating-sm">
                        <label for="phone">Phone Number</label>
                        <input type="phone" class="form-control form-control-sm" id="phone" name="phone" placeholder="Enter your phone number" value="{{ Auth()->user()->phone }}" readonly>
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
                        <input type="text" class="form-control form-control-sm" id="city" name="city" placeholder="Enter your city" value="{{ Auth()->user()->city }}" readonly>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-floating-sm">
                        <label for="postalcode">Post Code</label>
                        <input type="text" class="form-control form-control-sm" id="postalcode" name="postalcode" placeholder="Enter your post code" value="{{ Auth()->user()->postalcode }}" readonly>
                    </div>
                </div>
                <div class="col-md-12 my-1">
                    <div class="form-floating-sm">
                        <label for="address">Address</label>
                        <textarea type="text" class="form-control form-control-sm" id="address" name="address" placeholder="Enter your address" rows="3" readonly>{{ Auth()->user()->address }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <a href="/edit/profile" class="btn btn-dark">Edit Profile</a>
    </div>
    </form>
</div>
@endsection