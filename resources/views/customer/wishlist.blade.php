@extends('customer.main')

@section('container')
{{-- Products --}}
<div class="container my-5 px-3">
    @if ($itemwishlist->count() > 0)
    <h1 class="h3 title text-start ">Your Wishlist</h1>
    <div class="row">
        @foreach ($itemwishlist as $wish)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid shadow-sm">
                <div class="product-image">
                    <a href="/products/{{ $wish->product->slug }}" class="image">
                        <img class="img-1" src="{{ asset('img/customer/img-1.png') }}" width="500" height="500">
                        <img class="img-2" src="{{ asset('img/customer/img-2.png') }}" width="500" height="500">
                    </a>
                    @if($wish->product->discount >= 1)
                    <span class="product-hot-label">{{ $wish->product->discount }}% OFF</span>
                    @endif
                    {{-- <span href="" class="product-like-icon" data-tip="Add to Wishlist">
                        <i onclick="myFunction(this)" class="bx bx-heart"></i>
                    </span> --}}
                    <form action="/delete_wishlist" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $wish->id }}">
                        <button type="submit" class="btn btn-outline-light product-like-icon">
                            <i class="bx bxs-heart"></i>
                        </button>
                    </form>
                    <ul class="product-links">
                        <li><a href="/cart">Add to Cart</a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <ul class="rating row">
                        <a href="/stores?store={{ $wish->product->store->slug }}" class="store">
                            <img src="{{ asset('img/customer/bxs-check-shield.svg') }}" class="d-inline-block align-text-center" width="10"> {{ $wish->product->store->name }}</a>
                        <li class="disable">{{ $wish->product->sold }} Sold</li>
                    </ul>
                    <h3 class="title"><a href="/products/{{ $wish->product->slug }}">{{ $wish->product->name }}</a></h3>
                    @if($wish->product->discount >= 1)
                    <div class="price_ mt-2">Rp{{ $wish->product->price * ((100 - $wish->product->discount)/100) }}</div>
                    <div class="small text-secondary text-decoration-line-through diskon">
                        <sub class="mb-2">Rp{{ $wish->product->price }}</sub>
                    </div>

                    @else
                    <div class="price_ mt-2">Rp{{ $wish->product->price }}</div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach

        <div class="d-flex justify-content-end my-3">
            <div class="shadow-sm">
                {{ $itemwishlist->links() }}
            </div>
        </div>
    </div>

    @else
    <p class="text-center fs-4 title noproduct">No Product found</p>
    @endif
</div>
@endsection