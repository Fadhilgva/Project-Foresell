@extends('sb-admin.app')
@section('title', 'Users')
@section('users', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="text-grey">List Users</h1>
    {{-- @if (1 == 1)
        <table class="mt-4 table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Shop</th>
            </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i <= 5; $i++)
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>NAME</td>
                        <td>EMAIL@GMAIL.COM</td>
                        <td>Olshop22</td>
                    </tr>
                @endfor
            </tbody>
        </table>
     <div class="d-flex justify-content-center mt-2">{{ $post->links() }} </div>
    @else
        <div class="mt-4 alert alert-info" role="alert">
             Haven't User
        </div>
    @endif --}}

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
                                    <th>No WA</th>
                                    <th>Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <td>
                                            <div style="width:50px">
                                                {{-- <a href="#" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil"></i></a> --}}

                                                <button href="#" class="btn btn-danger btn-xs btn-hapus" id="delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                        <td>Adintaa</td>
                                        <td>adinta@gmail.com</td>
                                        <td>User</td>
                                        <td>0895392598133</td>
                                        <td>L</td>
                                        <td>Jl. Kebagusan</td>
                                        <td>null</td>
                                        <td>null</td>
                                    </tr>
                                @endfor
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
