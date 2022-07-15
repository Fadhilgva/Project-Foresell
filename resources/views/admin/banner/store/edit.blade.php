@extends('sb-admin.app')
@section('title', 'Edit Store Banner Promotion')
@section('bannerStore', 'active')
@section('banner', 'show')
@section('banner-active', 'active')

@section('content')

    <h1 class="grey">Edit Store Banner Promotion</h1>
    {{-- EDIT --}}

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('bannerStore.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                {{-- Store --}}
                <div class="mb-3">
                    <label for="store" class="form-label">Store</label>
                    <select name="store" class="form-control form-select">
                        <option value="{{ old('store') ? 'store' : $store->store_id }}">{{ old('store') ? 'store' : $store->name }}</option>
                        @foreach ($stores as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('store')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- image --}}
                <div class="form-group mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/admin-foresell/list/banner-store" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>


@endsection
