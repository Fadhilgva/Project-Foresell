@extends('admin_toko.layout.core_store')

<title>Foresell - Profile</title>

@section('judul')
@endsection

@section('content')
<div class="container rounded shadow-sm my-1 border">
    @if (session()->has('updateprofile'))
    <div class="col-6 mx-auto my-2">
        <div class="alert alert-success text-center" role="alert">
            <small>{{ session('updateprofile') }}</small>
        </div>
    </div>
    @endif

    <form class="mt-3">
        <div class="row">
            @foreach ($stores as $store)
            <div class="col-md-2 mt-4">
                <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle my-0" width="150px" src='\image\adminToko\logo\{{ $store->image }}'>
                </div>
            </div>
            <div class="col-md-5 mt-3">
                <div class="row g-3">
                    <h5 class="mt-4 mb-2 title">Store Profile</h5>
                    <div class="col-md-12 my-2">
                        <div class="form-floating-sm subtitle">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-sm subtitle" id="name" name="name" placeholder="Enter your full name" value="{{ $store->store }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 my-1">
                        <div class="form-floating-sm subtitle">
                            <label for="location">Location</label>
                            <input type="text" class="form-control form-control-sm subtitle" id="location" name="location" placeholder="Enter your store Location" value="{{ $store->location }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 my-1">
                        <div class="form-floating-sm subtitle">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control form-control-sm subtitle" id="description" name="description" placeholder="Enter your Store Description" rows="3" readonly>{{ $store->desc }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4 pt-2">
                <div class="row g-3">
                    <div class="col-md-12 my-1 mt-5">
                        <div class="mb-3 subtitle">
                            <label for="banner" class="form-label">Banner</label>
                            @if($store->banner)
                            <img src="\image\adminToko\logo\{{ $store->banner }}" class="img-preview img-fluid mb-4 shadow col-sm-12 d-block">
                            @else
                            <input class="form-control form-control-sm" id="banner" name="banner" type="file" disabled>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-5 text-center">
            <a href="/admin_toko/editprofile" class="btn btn-dark">Edit Profile</a>
        </div>
    </form>
</div>
@endsection