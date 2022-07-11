@extends('sb-admin.app')
@section('title', 'Edit Courier')
@section('couriers', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="grey">Edit Courier</h1>
    {{-- EDIT --}}

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('couriers.update', $couriers->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                {{-- Name --}}
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name') ? old('name') : $couriers->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- logo --}}
                <div class="form-group mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    @error('logo')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/admin-foresell/list/couriers" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>


@endsection
