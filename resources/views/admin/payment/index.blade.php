@extends('sb-admin.app')
@section('title', 'payment')
@section('payment', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="text-grey">Payment Method</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <p>
                        <div class="row">
                            <div class="col-md-3">
                                <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                                    Refresh</button>

                                {{-- <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i>
                                    Filter</a> --}}
                                <a href="#" class="btn btn-sm btn-flat btn-primary" id="btn-daftar"><i class="fa fa-plus"></i>
                                    Tambah</a>
                            </div>

                            <div class="col-md-9 d-flex justify-content-end">
                                <form method="GET" action="{{ url('/admin-foresell/list/payment') }}" class="form-inline">
                                    <div class="input-group">
                                        <input type="text" name="keyword" value="{{ $keyword }}" class="form-control border-1 small" placeholder="Search.."/>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                          <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </p>
                </div>
                {{-- TABLE --}}
                <div class="box-body">
                    <div class=" ">
                        <table class="table tbl-users table-responsive-sm table-hover table-bordered bg-white">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">No (Rekening / Gopay / Ovo)</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment as $pay)
                                <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div style="width:87px">
                                                <a href="{{ route('payment.edit', $pay->id)}}" class="btn btn-warning btn-small btn-edit"
                                                    id="edit"><i class="fas fa-pen"></i></a>

                                                <a href="/admin-foresell/list/payment/{{ $pay->id }}/confirm" class="btn btn-danger btn-small btn-hapus"
                                                    id="delete"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <img src="/image/admin/payment/{{ $pay->logo }}" alt="" width="60" height="50">
                                        </td>
                                        <td>{{ $pay->name }}</td>
                                        <td>{{ $pay->type }}</td>
                                        <td>{{ $pay->noPayment }}</td>
                                        <td>{{ $pay->created_at->diffForHumans() }}</td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL --}}
    <div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
        <div class="modal-dialog modal-default modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form role="form" action="#" method="get">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dari Tanggal</label>
                                <input type="text" class="form-control datepicker" id="exampleInputEmail1"
                                    placeholder="Dari Tanggal" name="dari" autocomplete="off"
                                    value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Sampai tanggal</label>
                                <input type="text" class="form-control datepicker" name="sampai"
                                    id="exampleInputPassword1" placeholder="dari tanggal" autocomplete="off"
                                    value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Role</label>
                                <select class="form-control" name="role">
                                    <option value="all" selected>All Role</option>
                                    <option value="4">Customer</option>
                                    <option value="3">Admin</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary ml-3 mb-4">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DAFTAR --}}
    <div class="modal fade" id="modal-daftar" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
        aria-hidden="true">
        <div class="modal-dialog modal-default modal-dialog-centered " role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{ Route('payment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- TYPE --}}
                        <div class="form-group mb-3">
                            <label for="tipe" class="form-label ">Type</label>
                            <select name="type" id="" class="form-control form-select">
                                <option value="bank">Bank</option>
                                <option value="gopay">Gopay</option>
                                <option value="ovo">Ovo</option>
                                <option value="cod">COD</option>
                            </select>
                            @error('type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- logo --}}
                        <div class="mb-3">
                            <label for="logo" class="form-label ">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @error('logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Payment --}}
                        <div class="form-group mb-3">
                            <label for="noPayment" class="form-label">No ( rekening / gopay / ovo)</label>
                            <input type="text" class="form-control" name="noPayment" id="">
                            @error('noPayment')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            // btn refresh
            $('.btn-refresh').click(function(e) {
                e.preventDefault();
                $('.preloader').fadeIn();
                location.reload();
            })

            $('.btn-filter').click(function(e) {
                e.preventDefault();

                $('#modal-filter').modal();
            })

            $("#btn-daftar").click(function(e) {
                e.preventDefault();

                $('#modal-daftar').modal();
            })

        })
    </script>
@endsection
