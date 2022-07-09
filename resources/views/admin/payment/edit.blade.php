@extends('sb-admin.app')
@section('title', 'payment')
@section('payment', 'active')
@section('main', 'show')
@section('main-active', 'active')


@section('content')

    <h1 class="grey">Edit Bank</h1>
    {{-- EDIT --}}

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                {{-- Name --}}
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name') ? old('name') : $payment->bankName }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TYPE --}}
                <div class="form-group mb-3">
                    <label for="tipe" class="form-label">Type</label>
                    <select name="type" id="" class="form-control form-select">
                        <option value="bank">Bank</option>
                        <option value="gopay">Gopay</option>
                        <option value="ovo">Ovo</option>
                        <option value="ovo">COD</option>
                    </select>
                    @error('type')
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
                    <label for="noRekening" class="form-label">No ( rekening / gopay / ovo)</label>
                    <input type="text" class="form-control" name="noRekening" id="" value="{{old('noRekening') ? old('noRekening') : $payment->noRekening }}">
                    @error('noRekening')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/admin-foresell/list/payment" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>


@endsection
