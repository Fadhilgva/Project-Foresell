<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <a href="/" class="mt-4 ml-3 btn"><i class="fa fa-long-arrow-left" style="font-size:40px;"></i></a>

<section class="vh-100 mt-1 mb-5 pt-5">

    <div class="container-fluid h-custom mt-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="{{ route('foresell.store') }}">
                @csrf

                <h1 class="fw-bold mb-3">Create Account</h1>
                <!-- Name -->

                <div class="form-outline mb-4">
                    <input type="text" id="form3Example3" class="form-control form-control-lg"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                    <label class="form-label" for="form3Example3">Full Name</label>

                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>

                <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control form-control-lg @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="Enter a valid email address" />
                <label class="form-label" for="form3Example3">{{ __('Email Address') }}</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                    <input type="password" id="form3Example4" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                    placeholder="Enter password" />
                    <label class="form-label" for="form3Example4">{{ __('Password') }}</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password Confirm -->
                <div class="form-outline mb-3">
                    <input type="password" id="password_confirmation" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password"
                    placeholder="Confirm password" />
                    <label class="form-label" for="password_confirmation" value="__('Confirm Password')">{{ __('Confirm Password') }}</label>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                    <button type="submit" class="btn btn-primary btn-lg"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Create') }}</button>

                    <p class="small fw-bold mt-2 pt-1 mb-0">Already registered?
                        <a href="/admin-foresell/login" class="link-danger">{{ __('Login') }}</a>
                    </p>

                </div>
            </form>
        </div>
      </div>
    </div>
    {{-- <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary mt-5">

    </div> --}}
  </section>
</body>
</html>



