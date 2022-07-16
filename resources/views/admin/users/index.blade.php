@extends('sb-admin.app')
@section('title', 'Users')
@section('users', 'active')
@section('main', 'show')
@section('main-active', 'active')

@push('script')
    <script src="{{ asset('/vendor/admin_store/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendor/admin_store/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')

    <h1 class="text-grey">List Users</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header mb-2">
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                                Refresh</button>

                            {{-- <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i>
                                Filter</a> --}}
                        </div>

                        {{-- SEARCH --}}
                        {{-- <div class="col-md-9 d-flex justify-content-end">
                            <form method="GET" action="{{ url('/admin-foresell/list/users') }}" class="form-inline">
                                <div class="input-group">
                                    <input type="text" name="keyword" value="{{ $keyword }}" class="form-control border-1 small"
                                        placeholder="Search.." />
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                </div>

                {{-- TABLE --}}
                <div class="box-body">
                    <div class="">
                        <table id="example1"
                            class="table tbl-users table-responsive-sm table-hover table-bordered bg-white">
                            <thead class="table-dark">
                                <tr>
                                    <th width="100">Action</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Alamat</th>
                                    <th>Created At</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div>

                                                <a href="/admin-foresell/list/users/{{ $user->id }}/show"
                                                    class="btn btn-warning btn-sm btn-eye" id=""><i
                                                        class="fa fa-eye"></i></a>

                                                <a href="/admin-foresell/list/users/{{ $user->id }}/confirm"
                                                    class="btn btn-danger btn-hapus btn-sm" id="delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td>{{ $user->userName }}</td>
                                        <td>{{ $user->Email }}</td>
                                        <td>{{ $user->RoleName }}</td>
                                        <td>{{ $user->Phone }}</td>
                                        <td><small>{{ $user->Address }}</small></td>
                                        <td>{{ $user->Register }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                {{-- MODAL --}}
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

            })
        </script>
    @endsection
