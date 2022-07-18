@extends('admin_toko.layout.core_store')

<title>Foresell - Products</title>

@section('judul')
<p class="ms-4 title">Products</p>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- /.card-header -->
    <div class="card-body">
        <a href="/admin_toko/data_produk/create" class="btn btn-primary mb-3">Add Product</a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    {{-- <th scope="col">Store</th> --}}
                    <th scope="col">Product Picture</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sold</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Picture</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sold</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </tfoot>
            <tbody>
                @forelse ($data_produk as $key => $item)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$item->Category->name}}</td>
                    <td><img src="\img\admin_store\{{$item->image}}" alt="" width="50" height="50"></td>
                    <td>{{$item->name}}</td>
                    <td>Rp{{number_format($item->price, 0,",",".")}}</td>
                    <td>{{$item->sold}}</td>
                    <td>{{$item->discount}}</td>
                    <td>{{$item->stock}}</td>
                    <td>
                        <form action="/admin_toko/data_produk/{{$item->id}}" method="POST">
                            <a type="button" class="btn btn-Info mb-3" href="/admin_toko/data_produk/{{$item->id}}">Detail</a>
                            <a type="button" class="btn btn-warning mb-3" href="/admin_toko/data_produk/{{$item->id}}/edit">Edit</a>

                            @csrf
                            @method('delete')

                            <a href="/admin_toko/data_produk/{{ $item->id }}/confirm" class="btn btn-danger mb-3" id="delete">Delete</a>
                            {{-- <input type="submit" class="btn btn-danger mb-3" value="Delete"> --}}
                        </form>
                    </td>
                </tr>

                @empty
                <h1>No data available in table</h1>
                @endforelse

            </tbody>



        </table>
    </div>
</div>
@endsection