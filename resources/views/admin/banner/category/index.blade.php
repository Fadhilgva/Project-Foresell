@extends('sb-admin.app')
@section('title', 'Category Banner Promotion')
@section('bannerCategory', 'active')
@section('banner', 'show')
@section('banner-active', 'active')

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

    <h1 class="text-grey">Category Banner Promotion</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-header mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                                Refresh</button>

                            {{-- <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i>
                                Filter</a> --}}
                            <a href="#" class="btn btn-sm btn-flat btn-primary" id="btn-daftar"><i
                                    class="fa fa-plus"></i>
                                Tambah</a>
                        </div>
                    </div>
                </div>
                {{-- TABLE --}}
                <div class="box-body">
                    <div class="">
                        <table id="example1"
                            class="table tbl-users table-responsive-sm table-hover table-bordered bg-white">
                            <thead class="table-dark">
                                <tr>
                                    <th>Action</th>
                                    <th>Category ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner as $item)
                                    <tr>
                                        <td>
                                            <a href="/admin-foresell/list/banner-category/{{ $item->id }}/edit"
                                                class="btn btn-warning btn-edit btn-sm" id="btn-edit"><i
                                                    class="fas fa-pen"></i></a>

                                            <a href="/admin-foresell/list/banner-category/{{ $item->id }}/confirm"
                                                class="btn btn-danger btn-sm btn-hapus" id="delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                        <td>#{{ $item->category_id }}</td>
                                        <td>
                                            <img src="/image/admin/banner/category/{{ $item->image }}" alt="gambar"
                                                width="50" height="50">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at }}</td>

                                    </tr>
                                @endforeach

                        </table>
                    </div>
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
                    <form action="{{ Route('bannerCategory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Category --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">category</label>
                            <select name="category" class="form-control form-select">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- DESC --}}
                        <div class="mb-3">
                            <label for="editor" class="form-label ">Description</label>
                            <textarea name="desc" class="form-control" id="editor">{{ old('desc') ? old('desc') : '' }}</textarea>
                            @error('desc')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label ">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // btn refresh
            $('.btn-refresh').click(function(e) {
                e.preventDefault();
                $('.preloader').fadeIn();
                location.reload();
            })
            $("#btn-daftar").click(function(e) {
                e.preventDefault();

                $('#modal-daftar').modal();
            })
        });

        ClassicEditor
            .create(document.querySelector('#editor'), {
                fontFamily: {
                    options: [
                        'default',
                        'Ubuntu, Arial, sans-serif',
                        'Ubuntu Mono, Courier New, Courier, monospace'
                    ]
                },
                toolbar: [
                    'heading', 'fontFamily', 'bold', 'italic', 'undo', 'redo'
                ]
            })

            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
