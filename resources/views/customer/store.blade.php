@extends('customer.main')

@section('container')
{{-- Store --}}
<div>
    @foreach ($products->take(1) as $b)
    <div class="shadow">
        @if($b->store->banner)
        <img src="\image\adminToko\logo\{{ $b->store->banner }}" alt="" width="1519" height="400">
        @else
        <img src="{{ asset('img/customer/banner.jpg') }}" alt="" width="1519" height="400">
        @endif
    </div>
    <div class="container mt-5">
        <div class="card storepage border-0 shadow">
            <div class="row row-cols-2">
                <div class="col-5">
                    <div class="row">
                        <div class="col-3 icon">
                            @if($b->store->image)
                            <img src="\image\adminToko\logo\{{ $b->store->image }}" width=120 height=120 class="rounded-circle border border-dark">
                            @else
                            <img src="{{ asset('img/customer/asus.png') }}" width=120 height=120 class="rounded-circle border border-dark">
                            @endif
                        </div>
                        <div class="col ms-4 mt-lg-auto">
                            <p class="store_name"><img src="{{ asset('img/customer/bxs-check-shield.svg') }}" class="d-inline-block align-text-center" width="23"> {{ $b->store->name }}</p>
                            <div class="storedetails_ fs-6">
                                <p class="mt-1 d-inline">{{ $products->count() }} Products</p>
                                <p class="mx-2 d-inline">|</p>
                                <p class="mt-1 d-inline"><i class='bx bxs-map'></i>{{ $b->store->location }}</p>
                                <p class="register">Registered {{ $b->store->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7 description_">
                    <p class="me-5">{{ $b->store->desc }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto col-5" role="alert">
        <small>{{ session('success') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>

{{-- Products --}}
@if ($products->count() > 0)
<div class="container my-3 p-1">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid shadow-sm">
                <div class="product-image">
                    <a href="/products/{{ $product->slug }}" class="image">
                        @if($product->image & $product->image1)
                        <img class="img-1" src="img/admin_store/{{ $product->image }}" width="500" height="500">
                        <img class="img-2" src="img/admin_store/{{ $product->image1 }}" width="500" height="500">
                        @else
                        <img class="img-1" src="{{ asset('img/customer/img-1.png') }}" width="500" height="500">
                        <img class="img-2" src="{{ asset('img/customer/img-2.png') }}" width="500" height="500">
                        @endif
                    </a>
                    @if($product->discount >= 1)
                    <span class="product-hot-label">{{ $product->discount }}% OFF</span>
                    @endif
                    <form action="/add" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-link product-like-icon">
                            <i class="bx bx-heart"></i>
                        </button>
                        @Auth
                        <button type="submit" class="btn btn-link product-like-icon">
                            @if ($itemwishlist->where('product_id', $product->id)
                            ->where('user_id', Auth::user()->id)
                            ->first())
                            <i class="bx bxs-heart"></i>
                            @else
                            <i class="bx bx-heart"></i>
                            @endif
                        </button>
                        @endauth
                    </form>
                    <form action="/add_cart/{{ $product->id }}" method="POST">
                        @csrf
                        <ul class="product-links">
                            <li>
                                <a>
                                    <button type="submit" class="btn btn-link text-decoration-none text-white pb-5">Add to Cart</button>
                                </a>
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="product-content">
                    <ul class="rating row">
                        <a href="/stores?store={{ $product->store->slug }}" class="store">
                            <img src="{{ asset('img/customer/bxs-check-shield.svg') }}" class="d-inline-block align-text-center" width="10"> {{ $product->store->name }}</a>
                        <li class="disable">{{ $product->sold }} Sold</li>
                    </ul>
                    <h3 class="title"><a href="/products/{{ $product->slug }}">{{ $product->name }}</a></h3>
                    @if($product->discount >= 1)
                    <div class="price_ mt-2">Rp{{ number_format($product->price * ((100 - $product->discount)/100), 0,",",".") }}</div>
                    <div class="small text-secondary text-decoration-line-through diskon">
                        <sub class="mb-2">Rp{{ number_format($product->price, 0,",",".") }}</sub>
                    </div>

                    @else
                    <div class="price_ mt-2">Rp{{ number_format($product->price, 0,",",".") }}</div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end my-3">
        <div class="shadow-sm">
            {{ $products->links() }}
        </div>
    </div>
</div>

@else
<p class="text-center fs-4 title noproduct">No Product found</p>
@endif
@endsection