@extends('customer.main')

@section('container')
<div class="container my-5 px-4">
    <div class="h3 mb-3 title">Your Orders</div>
    <div class="col-lg-10">
        <div class="row">
            <div class="col-md-12 shadow-sm">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white">
                    <table class="table manage-candidates-top mb-0 rounded">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 10; $i++) <tr class="candidates-list shadow-sm">
                                <div class="row">
                                    <td class="d-flex align-items-center">
                                        <div class="thumb">
                                            <a href="/product">
                                                <img class="img-fluid" src="{{ asset('img/customer/img-1.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="candidate-list-details">
                                            <div class="candidate-list-info">
                                                <div class="candidate-list-title_">
                                                    <h5 class="mb-0">
                                                        <a href="/product" class="text-decoration-none title">Asus TUF Dash F15</a>
                                                    </h5>
                                                </div>
                                                <div class="candidate-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <a href="" class="store">
                                                                <img src="{{ asset('img/customer/bxs-check-shield.svg') }}" class="d-inline-block align-text-center" width="10"> Asus Official Store
                                                            </a>
                                                        </li>
                                                        <li>23 Juni 2022</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-items-center">
                                        <p class="badge text-bg-success p-2">Finished</p>
                                    </td>
                                    <div>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </div>
                                    <td class="align-items-center">
                                        <p class="title mb-0">Total</p>
                                        <span>Rp37200000</span>
                                    </td>
                                    <div>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </div>
                                    <td class="align-items-center">
                                        <a href="/orderdetails" class="btn btn-dark">View Detail
                                            <i class='bx bx-chevron-right'></i>
                                        </a>
                                    </td>
                                </div>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection