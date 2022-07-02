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
            </div>

            {{-- Payment --}}
            <div class="row">
                <div class="col-8 my-3">
                    <form action="post">
                        <div class="mb-4">
                            <div>
                                <h5 class="mt-4 mb-2 title">Payment Method</h5>
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <img src="{{ asset('img/customer/cc.png') }}" width="25" class="me-2">
                                                BNI Virtual Account
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="form-check my-5 mx-3">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <div class="accordion-body small">
                                                    No. Rekening : <strong>8807 0813 5763 8723</strong>
                                                    <br>
                                                    <br>
                                                    Bayarkan pesanan ke Virtual Account di atas <br>dengan Total Pembayaran : <strong>Rp37200000</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <img src="{{ asset('img/customer/gopay.png') }}" width="25" class="me-2">
                                                Gopay
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="form-check my-5 mx-3">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <div class="accordion-body small">
                                                    No. Rekening : <strong>8807 0813 5763 8723</strong>
                                                    <br>
                                                    <br>
                                                    Bayarkan pesanan ke Virtual Account di atas <br>dengan Total Pembayaran : <strong>Rp37200000</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                <img src="{{ asset('img/customer/ovo.png') }}" width="25" class="me-2">
                                                OVO
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                            <div class="form-check my-5 mx-3">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <div class="accordion-body small">
                                                    No. Rekening : <strong>8807 0813 5763 8723</strong>
                                                    <br>
                                                    <br>
                                                    Bayarkan pesanan ke Virtual Account di atas <br>dengan Total Pembayaran : <strong>Rp37200000</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                                <img src="{{ asset('img/customer/cod.png') }}" width="25" class="me-2">
                                                Cash On Delivery
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                            <div class="form-check my-5 mx-3">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <div class="accordion-body small">
                                                    No. Rekening : <strong>8807 0813 5763 8723</strong>
                                                    <br>
                                                    <br>
                                                    Bayarkan pesanan ke Virtual Account di atas <br>dengan Total Pembayaran : <strong>Rp37200000</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div>
                                <h5 class="mt-4 mb-4 title">Shipping Courier</h5>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <label class="list-group-item d-flex gap-2 my-2">
                                                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios1" value="" checked />
                                                    <span>
                                                        <img src="{{ asset('img/customer/jnt.png') }}" class="rounded-circle me-1" width="30">
                                                        J&T Express
                                                    </span>
                                                </label>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label class="list-group-item d-flex gap-2 my-2">
                                                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios2" value="" />
                                                    <span>
                                                        <img src="{{ asset('img/customer/ninja.png') }}" class="rounded-circle me-1" width="30">
                                                        Ninja Xpress
                                                    </span>
                                                </label>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label class="list-group-item d-flex gap-2 my-2">
                                                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="" />
                                                    <span>
                                                        <img src="{{ asset('img/customer/sicepat.png') }}" class="rounded-circle me-1" width="30">
                                                        SiCepat Ekspres
                                                    </span>
                                                </label>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label class="list-group-item d-flex gap-2 my-2">
                                                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="" />
                                                    <span>
                                                        <img src="{{ asset('img/customer/lion.png') }}" class="rounded-circle me-1" width="30">
                                                        Lion Parcel
                                                    </span>
                                                </label>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label class="list-group-item d-flex gap-2 my-2">
                                                    <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios" id="listGroupRadios3" value="" />
                                                    <span>
                                                        <img src="{{ asset('img/customer/jne.png') }}" class="rounded-circle me-1" width="30">
                                                        JNE Express
                                                    </span>
                                                </label>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4 my-3">
                    <div class="card border rounded-0 p-lg-1 bg-light">
                        <div class="card-body">
                            <h5 class="mb-4">Order Summary</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center justify-content-between my-2">
                                    <strong class="small font-weight-bold">Asus TUF Dash F15
                                    </strong>
                                    <span class="text-muted small">Rp{{ $a=18600000 }} x {{ $b=2 }}
                                    </span>
                                </li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between mt-3 mb-1">
                                    <strong class="small font-weight-bold">Total Discount
                                    </strong>
                                    <span>-Rp0
                                    </span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <strong class="small font-weight-bold">Total
                                    </strong>
                                    <span>Rp{{ $a * $b }}
                                    </span>
                                </li>
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
                        <a class="btn btn-dark" href="/completed">Place order <i class='bx bx-credit-card'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection