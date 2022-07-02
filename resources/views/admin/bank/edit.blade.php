@extends('sb-admin.app')
@section('title', 'Bank')
@section('Bank', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="grey">Edit Bank</h1>
    {{-- EDIT --}}

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('bank.update', $banks->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                {{-- Name --}}
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name') ? old('name') : $banks->bankName }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3 form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control mr-5" name="email" value="{{$banks->email }}">
                    @error('email')
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

                {{-- Rekening --}}
                <div class="form-group mb-3">
                    <label for="noRekening" class="form-label">No Rekening</label>
                    <input type="text" class="form-control" name="noRekening" id="" value="{{old('noRekening') ? old('noRekening') : $banks->noRekening }}">
                    @error('noRekening')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- No --}}
                <div class="form-group mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phoneNumber" id="" value="{{old('phoneNumber') ? old('phoneNumber') : $banks->phoneNumber }}">
                    @error('phoneNumber')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/admin/list/bank" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>


@endsection
