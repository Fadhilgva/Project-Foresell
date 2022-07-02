@extends('sb-admin.app')
@section('ajax')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('title', 'Kurir')
@section('kurir', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="text-grey">List Kurir</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header">
                    <p>
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                            Refresh</button>

                        <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i>
                            Filter</a>

                        <a href="#" class="btn btn-sm btn-flat btn-primary" id="btn-daftar"><i class="fa fa-plus"></i>
                            Tambah</a>
                    </p>
                </div>
                {{-- TABLE --}}
                <div class="box-body">
                    <div class=" ">
                        <table class="table tbl-users table-responsive-sm table-hover table-bordered bg-white">
                            <thead class="table-dark">
                                <tr>
                                    <th>Action</th>
                                    <th>Profil</th>
                                    <th>Nama</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Model</th>
                                    <th>No. Pol</th>
                                    <th>Umur</th>
                                    <th>Gender</th>
                                    <th>No. Telp</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <td>
                                            <div style="width:100px">
                                                <a href="#" class="btn btn-warning btn-small btn-edit"
                                                    id="edit"><i class="fas fa-pen"></i></a>

                                                <button href="#" class="btn btn-danger btn-small btn-hapus"
                                                    id="delete"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                        <td>gambar</td>
                                        <td>Leo Leo</td>
                                        <td>Motor</td>
                                        <td>Honda</td>
                                        <td>B 0121 CFS</td>
                                        <td>30</td>
                                        <td>L</td>
                                        <td>08123274</td>
                                        <td>21 Maret 2020</td>
                                    </tr>
                                @endfor
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

                            <div lass="form-group mb-2">
                                <label for="umur">Umur</label> <br>
                                <input class="form-control" type="number" min=18 max=60 name="umur">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer mt-3">
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

                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- NAME / TGL LAHIR --}}
                        <div class="row">
                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            {{-- Tgl Lahir --}}
                            <div class="col-md-6">
                                <div class="mb-6">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday"
                                        value="{{ old('birthday') }}">
                                    @error('birthday')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- GENDET / NO --}}
                        <div class="row">
                            {{-- Gender --}}
                            <div class="col-md-6">
                                <div class="mb-3 form-group">
                                    <label for="gender" class="form-label">Gender</label> <br>
                                    <select class="form-select" name="gender" id="">
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            {{-- No --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="phoneNumber" id="">
                                    @error('phoneNumber')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control mr-5" name="email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            {{-- NIK --}}
                            <div class="col-md-6">
                                <div class="mb-3 form-group">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control mr-5" name="nik">
                                    @error('nik')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div class="row">
                            <div class="mb-4 form-group col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control mr-5" name="alamat">
                                @error('alamat')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Province --}}
                            <div class="col-md-6">
                                <select class="form-select mb-3" name="province" id="province">
                                    <option value="">Pilih Provinsi..</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Regencies --}}
                            <div class="col-md-6">
                                <select class="form-select mb-3" name="regency" id="regency">

                                </select>
                            </div>

                            {{-- districts --}}
                            <div class="col-md-6">
                                <select class="form-select mb-3" name="district" id="district">

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {{-- Jenis Kendaraan --}}
                                <div class="form-group mb-3">
                                    <label for="kendaraan " class="form-label">Kendaraan</label>
                                    <select class="form-select selectpicker" name="kendaraan" id=""
                                        aria-label="Filter select">
                                        <option value="">Pilih Kendaraan</option>
                                        <option value="">Motor</option>
                                        <option value="">Mobil Pick Up</option>
                                        <option value="">Truk Box</option>
                                    </select>
                                    @error('kendaraan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- No Pol --}}
                                <div class="mb-3">
                                    <label for="nopol" class="form-label">No Pol</label>
                                    <input type="text" class="form-control" id="nopol" name="nopol">
                                    @error('nopol')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Profil --}}
                        <div class="mb-3 col-md-12">
                            <label for="profil" class="form-label">Foto Profil</label>
                            <input type="file" class="form-control" id="profil" name="profil">
                            @error('profil')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Kendaraan --}}
                        <div class="mb-3 col-md-12">
                            <label for="foto_noPol" class="form-label">Foto Kendaraan</label>
                            <input type="file" class="form-control" id="foto_noPol" name="foto_noPol">
                            @error('foto_noPol')
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

        });
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#province').on('change', function() {
            let id_province = $('#province').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('getKabupaten') }}",
                data: {
                    id_province: id_province
                },
                cache: false,

                success: function(msg) {
                    $("#regency").html(msg);
                    $("#district").html("");
                }
            });

        });

        $('#regency').on('change', function() {
            let id_regency = $('#regency').val();

            $.ajax({
                type: 'POST',
                url: "{{ route('getKecamatan') }}",
                data: {
                    id_regency: id_regency
                },
                cache: false,

                success: function(msg) {
                    $("#district").html(msg);
                }
            });

        });
    </script>
@endsection
