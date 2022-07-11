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
	
    <a href="/admin_toko/kategori/create" class="btn btn-primary mb-3">Add Categories</a>
      

	<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Picture</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Picture</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </tfoot>
        <tbody>
            @forelse ($kategori as $key => $item)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$item + image}}</td>
                    <td>{{$item + name}}</td>
                    <td>{{$item + slug}}</td>
                    <td>{{$item + desc}}</td>
                    <td>
                        <form action="/admin_toko/kategori/{{$item->id}}" method="POST">
                            <a type="button" class="btn btn-info" href="/admin_toko/kategori/{{$item->id}}", class="btn btn-info btn-sm">Detail</a>
                            <a type="button" class="btn btn-warning" href="/admin_toko/kategori/{{$item->id}}/edit">Edit</a> 

                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        
                        </form>
                    </td>
                </tr>
            @empty
                <h2>Empty</h2>
            @endforelse


        </tbody>
      </table>
    </div>
  </div>

@endsection