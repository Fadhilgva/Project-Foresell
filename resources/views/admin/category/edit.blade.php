@extends('sb-admin.app')
@section('title', 'Edit Category')
@section('category', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="grey">Edit Category</h1>
    {{-- EDIT --}}

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                {{-- Name --}}
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name') ? old('name') : $category->name }}">
                    @error('name')
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
                <a href="/admin-foresell/list/category" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>


@endsection
