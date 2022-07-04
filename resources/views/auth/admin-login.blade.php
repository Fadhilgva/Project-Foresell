@extends('customer.auth')

@section('container')
<div class="container sign_in">
  <div class="row">
    <div class="col text-center">
      <img src="{{ asset('img/customer/adminlogin.gif') }}" width="500">
    </div>
    <div class="col">
      <div class="d-flex align-items-center pt-5">
        <div class="container">
          <div class="d-flex justify-content-end me-lg-5">
            <a href="/">
              <img src="{{ asset('img/customer/bx-x.svg') }}" alt="" width="30">
            </a>
          </div>
          <div class="row">
            <div class="col-lg-10">
              <h3 class="display-6 title mb-0">Login as Admin</h3>
              <p class="caption-text text-muted mb-4">Please enter the details below to login</p>

              {{-- Alert registrasi sukses --}}
              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <small>{{ session('success') }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              {{-- Alert gagal login --}}
              @if (session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <small>{{ session('loginError') }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              <form action="{{ route('admin.login.store') }}" method="POST">
                @csrf
                <div class="form-floating mb-4">
                  <input type="email" name="email" class="form-control
                                    @error('email')
                                    is-invalid
                                    @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                  <label for="email">Email address</label>
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="password" class="form-control
                                    @error('password')
                                    is-invalid
                                    @enderror" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="row align-items-center mt-4">
                  <button type="submit" class="btn btn-dark login mx-auto">Login
                  </button>
                </div>
              </form>

              <p class="text-center small mt-2">
                Don't have an account yet?
                <a class="fw-bold text-decoration-none text-dark" href="/admin-foresell/register">Create One</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
