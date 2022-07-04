@extends('sb-admin.app')
@section('title', 'Users')
@section('users', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="text-grey">List Users</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <p>
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                            Refresh</button>

                        <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i>
                            Filter</a>

                    </p>
                </div>
                {{-- TABLE --}}
                <div class="box-body">
                    <div class="table-responsive table-hover">
                        <table class="table tbl-users bg-white table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Alamat</th>
                                    <th>Created At</th>

                                </tr>
                            </thead>
                            {{-- <tbody>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <td>
                                            <div style="width:50px">

                                                <button href="#" class="btn btn-danger btn-xs btn-hapus" id="delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                        <td>Adintaa</td>
                                        <td>adinta@gmail.com</td>
                                        <td>User</td>
                                        <td>0895392598133</td>
                                        <td>Jl. Kebagusan</td>
                                        <td>null</td>
                                    </tr>
                                @endfor
                            </tbody> --}}
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div style="width:50px">

                                            <button href="#" class="btn btn-danger btn-xs btn-hapus" id="delete"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                    <td>{{ $user->UserName }}</td>
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
                                    placeholder="Dari Tanggal" name="dari" autocomplete="off" value="{{ date('Y-m-d') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Sampai tanggal</label>
                                <input type="text" class="form-control datepicker" name="sampai" id="exampleInputPassword1"
                                    placeholder="dari tanggal" autocomplete="off" value="{{ date('Y-m-d') }}">
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
