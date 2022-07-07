@extends('admin_toko.layout.core_store')

<title>Foresell - Profile</title>

@section('judul')
    Profile Toko
@endsection

@section('content')

<div class="container rounded shadow-sm p-3 my-5 border">
    @if (session()->has('updateprofile'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <small>{{ session('updateprofile') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-md-2 mt-3">
            <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle my-0" width="150px" src="https://source.unsplash.com/150x150?technology">
            </div>
        </div>
        <div class="col-md-5 mt-3">
            <div class="row g-3">
                <h5 class="mt-4 mb-2 title">Profile Toko</h5>
                <div class="col-md-12 my-2">
                    <div class="form-floating-sm">
                        <label for="name">UserName (permanen)</label>
                        <p>UserName </p>
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-floating-sm">
                        <label for="name">Nama Toko</label>
                        <p>Toko A</p>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-floating-sm">
                        <label for="email">Email Address (permanen)</label>
                        <p>tokoA@Gmail.com</p>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-floating-sm">
                        <label for="phone">Phone Number</label>
                        <p>012345678</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-3">
            <div class="row g-3">
                <h5 class="mt-4 mb-2 title">Shipping Address</h5>
                <div class="col-md-6 my-2">
                    <div class="form-floating-sm">
                        <label for="city">City</label>
                        <p>Jakarta Timur</p>
                    </div>
                </div>
                <div class="col-md-6 my-1">
                    <div class="form-floating-sm">
                        <label for="postalcode">Post Code</label>
                        <p>131313</p>
                    </div>
                </div>
                <div class="col-md-12 my-1">
                    <div class="form-floating-sm">
                        <label for="address">Address</label>
                        <p>Menurut Rustan, Lorem Ipsum atau lipsum awalnya merupakan cuplikan literatur Latin klasik berjudul “De Finibus Bonorum et Malorum” karya Cicero pada 45 Sebelum Masehi. Berikut contoh teks lipsum yang sering digunakan: “Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 text-center">
        <a href="/admin_toko/profile/create" class="btn btn-dark">Edit Profile</a>
    </div>
    </form>
</div>


@endsection