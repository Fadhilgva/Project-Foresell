@extends('admin_toko.layout.core_store')

<title>Foresell - Data Order</title>

@section('judul')
    Data Order
@endsection

@push('script')
<script src="{{asset('admin_store/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin_store/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
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
                <th scope="col">#</th>
                <th scope="col">User_Id</th>
                <th scope="col">Bank_Id</th>
                <th scope="col">Courier_Id</th>
                <th scope="col">Total Discount</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address City</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User_Id</th>
                <th scope="col">Bank_Id</th>
                <th scope="col">Courier_Id</th>
                <th scope="col">Total Discount</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address City</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Action</th>
            </tr>
        </tfoot>
        <tbody>
            @forelse ($data_order as $key => $item)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->user_id}}</td>
                <td>{{$item->bank_id}}</td>
                <td>{{$item->courier_id}}</td>
                <td>{{$item->total_disc}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->address_city}}</td>
                <td>{{$item->postal_code}}</td>
                <td>
                    <form action="/admin_toko/data_order/{{$item->id}}" method="POST">
                        <a type="button" class="btn btn-Info mb-3" href="/admin_toko/data_order/{{$item->id}}">Detail</a>
                        @csrf
                        @method('delete')

                        <a href="/admin_toko/data_order/{{ $item->id }}/confirm" class="btn btn-danger mb-3" id="delete">Delete</a>
                        {{-- <input type="submit" class="btn btn-danger mb-3" value="Delete"> --}}

                    </form>
                </td>
            </tr>
            @empty
                <h5>No data available in table</h5>
            @endforelse
            
        </tbody>
  
        
  
      </table>
    </div>
  </div>

@endsection