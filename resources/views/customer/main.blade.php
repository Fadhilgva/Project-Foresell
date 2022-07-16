<!DOCTYPE html>
<html lang="en">

<head>
  @include('customer.head')
</head>

<body>
  @include('customer.navbar')

  <div>
    @yield('container')
  </div>

  @include('customer.footer')

  {{-- sweet alert --}}
  @include('sweetalert::alert')
  
  {{-- JavaScript Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <script src="{{ asset('js/customer/script.js') }}"></script>

</body>

</html>
