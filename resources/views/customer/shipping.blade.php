@extends('customer.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto" style="margin-top: 60px; margin-bottom:50px">
            {{-- Order Navigasi --}}
            <div>
                <div class="h2 mb-5 text-center title">Billing Information</div>
                <ul class="nav nav-tabs nav-fill border-bottom mb-3">
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">1. Shopping cart</a>
                    </li>
                    {{-- <li class="mx-auto"></li>
                    <li class="mx-auto">
                        <a class="nav-link title" aria-current="page">2. Shipping Details</a>
                    </li> --}}
                    <li class="mx-auto"></li>
                    <li class="mx-auto">
                        <a class="nav-link title" aria-current="page">2. Billing Information</a>
                    </li>
                    <li class="mx-auto"></li>
                    <li class="mx-auto">
                        <a class="nav-link disabled" aria-current="page">3. Completed</a>
                    </li>
                </ul>
            </div>

            {{-- Form --}}
            <form action="{{ route('store.billing', $carts->first()->first()->store_id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="row g-3">
                            <h5 class="mt-4 mb-2 title">Personal Profile</h5>
                            <div class="col-md-12 my-2">
                                <div class="form-floating-sm">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control form-control-sm
                @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your full name" value="{{ old('name', Auth()->user()->name) }}" required>
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
                @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email address" value="{{ old('email', Auth()->user()->email) }}" required>
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
                @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter your phone phone" value="{{ old('phone', Auth()->user()->phone) }}" required>
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
                @error('city') is-invalid @enderror" id="city" name="city" placeholder="Enter your city" value="{{ old('city', Auth()->user()->city) }}" required>
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
                @error('postalcode') is-invalid @enderror" id="postalcode" name="postalcode" placeholder="Enter your post code" value="{{ old('postalcode', Auth()->user()->postalcode) }}" required>
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
                @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter your address" rows="3" required>{{ old('address', Auth()->user()->address) }}</textarea>
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


                <div class="row">
                    <div class="col-lg-12 mx-auto" style="margin-top: 20px; margin-bottom:30px">
                        {{-- Order Navigasi --}}
                        {{-- <div>
                            <div class="h2 mb-5 text-center title">Billing Information</div>
                            <ul class="nav nav-tabs nav-fill border-bottom mb-3">
                                <li class="mx-auto">
                                    <a class="nav-link disabled" aria-current="page">1. Shopping cart</a>
                                </li>
                                <li class="mx-auto"></li>
                                <li class="mx-auto">
                                    <a class="nav-link disabled" aria-current="page">2. Shipping Details</a>
                                </li>
                                <li class="mx-auto"></li>
                                <li class="mx-auto">
                                    <a class="nav-link title" aria-current="page">3. Billing Information</a>
                                </li>
                                <li class="mx-auto"></li>
                                <li class="mx-auto">
                                    <a class="nav-link disabled" aria-current="page">3. Completed</a>
                                </li>
                            </ul>
                        </div> --}}

                        {{-- Payment --}}
                        <div class="row">
                            <div class="col-8 my-3">
                                <div class="mb-4">
                                    <div>
                                        @foreach ($carts as $cartdetail => $items)
                                        <h5 class="mt-4 mb-2 title">Payment Method</h5>
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            @foreach ($banks->take(4) as $bank)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-heading{{ $bank->id }}">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $bank->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $bank->id }}">
                                                        @if ($bank->image)
                                                        <img src="/image/admin/payment/{{ $bank->image }}" width="25" class="me-2">
                                                        @else
                                                        <img src="{{ asset('img/customer/cc.png') }}" width="25" class="me-2">
                                                        @endif
                                                        {{ $bank->name }}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{ $bank->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $bank->id }}" data-bs-parent="#accordionFlushExample">
                                                    <div class="form-check my-5 mx-3">
                                                        <input class="form-check-input" type="radio" name="bank" id="bank" value="{{ $bank->id }}" required>
                                                        <div class="accordion-body small">
                                                            @switch($bank->type)
                                                            @case($bank->type == 'bank')
                                                            No. Rekening :
                                                            <strong>{{ $bank->noPayment }}</strong>
                                                            @break

                                                            @case($bank->type == 'gopay')
                                                            No. Gopay :
                                                            <strong>{{ $bank->noPayment }}</strong>
                                                            @break

                                                            @case($bank->type == 'ovo')
                                                            No. Ovo :
                                                            <strong>{{ $bank->noPayment }}</strong>
                                                            @break

                                                            @case($bank->type == 'cod')
                                                            <strong>{{ $bank->noPayment }}</strong>
                                                            @break
                                                            @endswitch
                                                            <br>
                                                            <br>
                                                            Bayarkan pesanan ke nomor
                                                            @switch($bank->type)
                                                            @case($bank->type == 'bank')
                                                            Rekening
                                                            @break

                                                            @case($bank->type == 'gopay')
                                                            Gopay
                                                            @break

                                                            @case($bank->type == 'ovo')
                                                            Ovo
                                                            @break
                                                            @endswitch
                                                            di atas <br>dengan Total Pembayaran :
                                                            <strong>Rp{{ number_format($items->sum('total_product'), 0, ',', '.') }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            {{-- @foreach ($banks->skip(1)->take(1) as $bank)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        <img src="{{ asset('img/customer/gopay.png') }}" width="25" class="me-2">
                                                        {{ $bank->name }}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                    <div class="form-check my-5 mx-3">
                                                        <input class="form-check-input" type="radio" name="bank" id="bank" value="{{ $bank->id }}" required>
                                                        <div class="accordion-body small">
                                                            No. Gopay : <strong>{{ $bank->noPayment }}</strong>
                                                            <br>
                                                            <br>
                                                            Bayarkan pesanan ke Virtual Account di atas <br>dengan Total Pembayaran : <strong>Rp {{ $cartdetail->total }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @foreach ($banks->skip(2)->take(1) as $bank)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                        <img src="{{ asset('img/customer/ovo.png') }}" width="25" class="me-2">
                                                        {{ $bank->name }}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                    <div class="form-check my-5 mx-3">
                                                        <input class="form-check-input" type="radio" name="bank" id="bank" value="{{ $bank->id }}" required>
                                                        <div class="accordion-body small">
                                                            No. Ovo : <strong>{{ $bank->noPayment }}</strong>
                                                            <br>
                                                            <br>
                                                            Bayarkan pesanan ke Virtual Account di atas <br>dengan Total Pembayaran : <strong>Rp{{ $cartdetail->total }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @foreach ($banks->skip(3)->take(1) as $bank)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                                        <img src="{{ asset('img/customer/ovo.png') }}" width="25" class="me-2">
                                                        {{ $bank->name }}
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                                    <div class="form-check my-5 mx-3">
                                                        <input class="form-check-input" type="radio" name="bank" id="bank" value="{{ $bank->id }}" required>
                                                        <div class="accordion-body small">
                                                            No. Ovo : <strong>{{ $bank->noPayment }}</strong>
                                                            <br>
                                                            <br>
                                                            Bayarkan pesanan ke Virtual Account di atas <br>dengan Total Pembayaran : <strong>Rp{{ $cartdetail->total }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach --}}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div>
                                        <h5 class="mt-4 mb-4 title">Shipping Courier</h5>
                                        <table class="table">
                                            <tbody>
                                                @foreach ($couriers as $courier)
                                                <tr>
                                                    <th scope="row">
                                                        <label class="list-group-item d-flex gap-2 my-2">
                                                            <input class="form-check-input flex-shrink-0" type="radio" name="courier" id="listGroupRadios1" value="{{ $courier->id }}" required />
                                                            <span>
                                                                @if ($courier->image)
                                                                <img src="/image/admin/couriers/{{ $courier->image }}" class="rounded-circle me-1" width="30">
                                                                @else
                                                                <img src="{{ asset('img/customer/jnt.png') }}" class="rounded-circle me-1" width="30">
                                                                @endif
                                                                {{ $courier->name }}
                                                            </span>
                                                        </label>
                                                    </th>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 my-3">
                                <div class="card border rounded p-lg-1 bg-light">
                                    <div class="card-body">
                                        <h5 class="mb-4">Order Summary</h5>
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($carts as $cart => $items)
                                            @foreach ($items as $item)
                                            <li class="d-flex align-items-center justify-content-between my-2">
                                                <strong class="small font-weight-bold">{{ $item->Product->name }}</strong>
                                                <span class="text-muted small">Rp{{ number_format($item->total_product, 0, ',', '.') }}
                                                    x {{ $item->qty }}
                                                </span>
                                            </li>
                                            @endforeach
                                            @endforeach
                                            <li class="border-bottom my-2"></li>
                                            @foreach ($carts as $cart => $items)
                                            <li class="d-flex align-items-center justify-content-between mt-3 mb-1">
                                                <strong class="small font-weight-bold">Total Discount
                                                </strong>
                                                <span>-Rp{{ number_format($items->sum('discount'), 0, ',', '.') }}
                                                </span>
                                            </li>
                                            <li class="d-flex align-items-center justify-content-between">
                                                <strong class="small font-weight-bold">Total
                                                </strong>
                                                <span>Rp{{ number_format($items->sum('total_product'), 0, ',', '.') }}
                                                </span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Navigation --}}
                        <div>
                            <div class="row align-items-center text-center">
                                <div class="col-md-6 mb-3 mb-md-0 text-md-start">
                                    <a class="btn btn-outline-dark" href="/shipping"><i class='bx bx-left-arrow-alt'></i>Back</a>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <button class="btn btn-dark">Place order <i class='bx bx-credit-card'></i></button>
                                </div>
                            </div>
                        </div>
                        {{--
            </form> --}}
        </div>
    </div>

    {{-- Navigation --}}
    {{-- <div>
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
    </div> --}}
    </form>
</div>
</div>
</div>
@endsection