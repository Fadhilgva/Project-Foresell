@extends('admin_toko.layout.core_store')

<title>Foresell - Edit Profile</title>

@section('judul')
@endsection

@section('content')

<div class="container rounded shadow-sm my-1 border">
    @foreach ($stores as $store)
    <form action="/admin_toko/editprofile/{{ $store->id }}" method="POST" class="mt-3" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-2 mt-4">
                <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle my-0" width="150px" src="\image\adminToko\logo\{{ $store->image }}">
                </div>
                <input class="form-control form-control-sm subtitle
                @error('image')
                is-invalid
                @enderror" id="image" name="image" type="file">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-5 mt-3">
                <div class="row g-3">
                    <h5 class="mt-4 mb-2 title">Store Profile</h5>
                    <div class="col-md-12 my-2">
                        <div class="form-floating-sm subtitle">
                            <label for="name">Store Name</label>
                            <input type="text" class="form-control form-control-sm subtitle
                            @error('name')
                            is-invalid
                            @enderror" id="name" name="name" placeholder="Enter your full name" value="{{ $store->store }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 my-1">
                        <div class="form-floating-sm subtitle">
                            <label for="location">Location</label>
                            <input type="text" class="form-control form-control-sm subtitle
                            @error('location')
                            is-invalid
                            @enderror" id="location" name="location" placeholder="Enter your store Location" value="{{ $store->location }}">
                            @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 my-1">
                        <div class="form-floating-sm subtitle">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control form-control-sm subtitle
                            @error('description')
                            is-invalid
                            @enderror" id="description" name="description" placeholder="Enter your Store Description" rows="3">{{ old('description', $store->desc) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
                            <input class="form-control form-control-sm subtitle
                            @error('banner')
                            is-invalid
                            @enderror" id="banner" name="banner" type="file">
                            @error('banner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            @else
                            <input class="form-control form-control-sm subtitle
                            @error('banner')
                            is-invalid
                            @enderror" id="banner" name="banner" type="file">
                            @error('banner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-dark">Save Profile</button>
        </div>
    </form>
    @endforeach
</div>
@endsection