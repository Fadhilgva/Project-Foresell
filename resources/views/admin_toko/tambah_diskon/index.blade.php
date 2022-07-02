@extends('admin_toko.layout.core_store')

<title>Foresell - Tambah Diskon</title>

@section('judul')
    Tambah Diskon 
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
	
	
      

	<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Product Name</th>
                <th>Product Picture</th>
                <th>Category</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Discount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Product Name</th>
                <th>Product Picture</th>
                <th>Category</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Discount</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>1</td>
                <td>Yogurt</td>
                <td><img src="/img/admin_store/yogurt.jpg" width="100" class="img-thumbnail"></td>
                <td>Makanan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>50</td>
                <td>Rp 12.000</td>
                <td><button type="button" class="btn btn-success">Aktif</button></td>
                <td>12 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>hp Vivo X Fold</td>
                <td><img src="/img/admin_store/vivoxfold.jpg" width="100" class="img-thumbnail"></td>
                <td>Gadget</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>20</td>
                <td>Rp 25.000.000</td>
                <td><button type="button" class="btn btn-success">Aktif</button></td>
                <td>13 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sepeda Lipat</td>
                <td><img src="/img/admin_store/sepedaaja.jpg" width="100" class="img-thumbnail"></td>
                <td>Kendaraan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>10</td>
                <td>Rp 1.200.000</td>
                <td><button type="button" class="btn btn-danger">Tidak Aktif</button></td>
                <td>14 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Sepeda Lipat Pro</td>
                <td><img src="/img/admin_store/sepedalipat2.jpg" width="100" class="img-thumbnail"></td>
                <td>Kendaraan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>2</td>
                <td>Rp 3.500.000</td>
                <td><button type="button" class="btn btn-success">Aktif</button></td>
                <td>15 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Es krim Magnum Walls Almond</td>
                <td><img src="/img/admin_store/magnum.jpg" width="100" class="img-thumbnail"></td>
                <td>Makanan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>60</td>
                <td>Rp 50.000</td>
                <td><button type="button" class="btn btn-success">Aktif</button></td>
                <td>16 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>LEGO Ninjago 71742 Overlord Dragon</td>
                <td><img src="/img/admin_store/ninjago.jpg" width="100" class="img-thumbnail"></td>
                <td>Mainan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>20</td>
                <td>Rp 450.000</td>
                <td><button type="button" class="btn btn-success">Aktif</button></td>
                <td>17 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>7</td>
                <td>LEGO Ninjago 71706 Cole`s Speeder Car</td>
                <td><img src="/img/admin_store/lego.jpg" width="100" class="img-thumbnail"></td>
                <td>Mainan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>20</td>
                <td>Rp 150.000</td>
                <td><button type="button" class="btn btn-danger">Tidak Aktif</button></td>
                <td>18 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>8</td>
                <td>hp vivo T1 5G</td>
                <td><img src="/img/admin_store/vivohp.jpg" width="100" class="img-thumbnail"></td>
                <td>Gadget</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>10</td>
                <td>Rp 3.159.000</td>
                <td><button type="button" class="btn btn-success">Aktif</button></td>
                <td>19 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Greenfields Yogurt Strawberry 125 gr</td>
                <td><img src="/img/admin_store/yogurt2.jpg" width="100" class="img-thumbnail"></td>
                <td>Makanan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>70</td>
                <td>Rp 20.000</td>
                <td><button type="button" class="btn btn-danger">Tidak Aktif</button></td>
                <td>20 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Diamond Ice Cream Neapolitan 700ml</td>
                <td><img src="/img/admin_store/eskrimcoklat.jpg" width="100" class="img-thumbnail"></td>
                <td>Makanan</td>
                <td>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                <td>30</td>
                <td>Rp 40.000</td>
                <td><button type="button" class="btn btn-success">Aktif</button></td>
                <td>21 Agustus 2021</td>
                <td>0%</td>
                <td><a href="/admin_toko/tambah_diskon/edit" class="btn btn-primary my-2">Edit Diskon</a></td>
            </tr>
           
        </tbody>
  
        
  
      </table>
    </div>
  </div>

@endsection