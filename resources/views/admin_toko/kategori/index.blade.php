@extends('admin_toko.layout.core_store')

<title>Foresell - Kategori</title>

@section('judul')
    Kategori 
@endsection

@push('script')
<script src="{{asset('/vendor/admin_store/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/vendor/admin_store/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endpush
    
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    
@endpush

@section('content')
<div class="container-fluid">
    <!-- /.card-header -->
    <div class="card-body">
	
    <a href="/admin_toko/kategori/create" class="btn btn-primary my-2">Tambah Kategori</a>
      

	<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>1</td>
                <td>Makanan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td><a type="button" class="btn btn-warning" href="/admin_toko/kategori/edit">Ubah</a> <a type="button" class="btn btn-danger" href="#">Hapus</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Gadget</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td><a type="button" class="btn btn-warning" href="/admin_toko/kategori/edit">Ubah</a> <a type="button" class="btn btn-danger" href="#">Hapus</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Kendaraan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td><a type="button" class="btn btn-warning" href="/admin_toko/kategori/edit">Ubah</a> <a type="button" class="btn btn-danger" href="#">Hapus</a></td>
            </tr>
            
            <tr>
                <td>4</td>
                <td>Mainan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td><a type="button" class="btn btn-warning" href="/admin_toko/kategori/edit">Ubah</a> <a type="button" class="btn btn-danger" href="#">Hapus</a></td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

@endsection