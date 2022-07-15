@extends('customer.main')

@section('container')
{{-- Products --}}
<div class="container my-5 p-1">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto col-5" role="alert">
        <small>{{ session('success') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($products->count() > 0)
    <div class="h2 title mb-1 text-center">All Products</div>
    <div class="fs-6 mt-n1 mb-3 text-center">Finding Best Products Now in Your Fingertips</div>

    {{-- Products --}}
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid shadow-sm">
                <div class="product-image">
                    <a href="/products/{{ $product->slug }}" class="image">
                        @if($product->image)
                        <img class="img-1" src="img/admin_store/{{ $product->image }}" width="500" height="500">
                        @endif
                        @if($product->image1)
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
                    <div class="price_ mt-2">Rp{{ $product->price * ((100 - $product->discount)/100) }}</div>
                    <div class="small text-secondary text-decoration-line-through diskon">
                        <sub class="mb-2">Rp{{ $product->price }}</sub>
                    </div>

                    @else
                    <div class="price_ mt-2">Rp{{ $product->price }}</div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

        <div class="d-flex justify-content-end my-3">
            <div class="shadow-sm">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    @else
    <p class="text-center fs-4 title noproduct mt-3">No Product found</p>
    @endif
</div>
@endsection