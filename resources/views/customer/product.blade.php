@extends('customer.main')

@section('container')
<div class="container my-5">
    {{-- Product --}}
    <div class="row gx-lg-5 pt-3">
        <div class="col-md-5">
            <div class="col-md-12 mx-auto my-auto">
                <div class="main_image">
                    @if($product->image)
                    <img src="/img/admin_store/{{ $product->image }}" id="main_product_image" class="card-img-top img-fluid shadow-sm rounded" width="600" height="600" />
                    @else
                    <img src="{{ asset('img/customer/img-1.png') }}" id="main_product_image" class="card-img-top img-fluid shadow-sm rounded" width="600" height="600" />
                    @endif
                </div>
                <div class="thumbnail_images">
                    <ul id="thumbnail">
                        @if($product->image)
                        <li><img onclick="changeImage(this)" class="rounded" src="/img/admin_store/{{ $product->image }}" width="80" /></li>
                        @endif
                        @if($product->image1)
                        <li><img onclick="changeImage(this)" class="rounded" src="/img/admin_store/{{ $product->image1 }}" width="80" /></li>
                        @endif
                        @if($product->image2)
                        <li><img onclick="changeImage(this)" class="rounded" src="/img/admin_store/{{ $product->image2 }}" width="80" /></li>
                        @endif
                        @if($product->image3)
                        <li><img onclick="changeImage(this)" class="rounded" src="/img/admin_store/{{ $product->image3 }}" width="80" /></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-7 mb-auto">
            <div class="content">
                <form action="/add" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                    @guest
                    <button type="submit" class="btn btn-link btn-lg float-end">
                        <i class="bx bx-heart"></i>
                    </button>
                    @endguest
                    @Auth
                    <button type="submit" class="btn btn-link btn-lg float-end">
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
                <h3 class="display-6 fw-bolder product">{{ $product->name }}</h3>
                <span class="sold me-2">{{ $product->sold }} Sold</span>
                @if($product->discount >= 1)
                <div class="badge badge-sm text-wrap text-small mt-0" style="background-color: #ff6f00">
                    {{ $product->discount }}% OFF
                </div>
                @endif
                <div class="fs-5 row">

                    @if($product->discount >= 1)
                    <span class="price mt-3">
                        <div>Rp{{ number_format($product->price * ((100 - $product->discount)/100), 0,",",".") }}</div>
                    </span>
                    <span class="diskon_">
                        <sub class="fs-6 text-secondary text-decoration-line-through">Rp{{ number_format($product->price, 0,",",".") }}</sub>
                    </span>

                    @else
                    <span class="price mt-2">Rp{{ number_format($product->price, 0,",",".") }}</span>
                    @endif
                </div>
                @if (session()->has('success1'))
                <div class="alert alert-success alert-dismissible fade show text-center mx-auto col-auto" role="alert">
                    <small>{{ session('success1') }}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <span class="category">Category : <a href="/categories?category={{ $product->category->slug }}" class="text-decoration-none category_">{{ $product->category->name }}</a></span>
                <p class="category mt-2">Stock : {{ $product->stock }}</p>
                <p class="fs-7 description mt-1">{!! $product->desc !!}</p>
            </div>
            <div>
                <div class="mt-2">
                    <div class="quantity p-1 border-dark">
                        <form action="/add_cartproduct/{{ $product->id }}" method="POST">
                            @csrf
                            <div class="ms-3">
                                <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" class="border-0">
                                <button class="btn text-white" type="submit" style="background-color: #001135">Add to cart</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-5">
                    <ul class="d-flex justify-content-around">
                        <li><i class='bx bx-credit-card'></i> Buyer Protection</li>
                        <li><i class='bx bx-package'></i> Fash Shipping</li>
                        <li><i class='bx bx-badge-check'></i> Warranty</li>
                    </ul>
                </div>
                <hr>
                <div class="store mt-4">
                    <div class="card border-0 p-0 shadow-none">
                        <div class="row">
                            <div class="col-1">
                                <a href="/stores?store={{ $product->store->slug }}">
                                    @if($product->store->image)
                                    <img src="\image\adminToko\logo\{{ $product->store->image }}" width=70 height=70 class="rounded-circle border border-dark">
                                    @else
                                    <img src="{{ asset('img/customer/asus.png') }}" width=70 height=70 class="rounded-circle border border-dark">
                                    @endif
                                </a>
                            </div>
                            <div class="col ms-5 my-1">
                                <a href="/stores?store={{ $product->store->slug }}" class="store_"><img src="{{ asset('img/customer/bxs-check-shield.svg') }}" class="d-inline-block align-text-center" width="15"> {{ $product->store->name }}</a>
                                <div class="storedetails">
                                    <p class="product_store d-inline">{{ $product->where('store_id', '=', $product->store->id)
                                        ->count() }} Products</p>
                                    <p class="mx-2 d-inline">|</p>
                                    <p class="location d-inline"><i class='bx bxs-map'></i>{{ $product->store->location }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- More in this Store --}}
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mx-auto col-5" role="alert">
        <small>{{ session('success') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container my-5">
        <div class="container">
            <div class="h4 title mb-1">More in {{ $product->store->name }}</div>
            <div id="carouselExampleIndicators1" class="carousel slide mb-0" data-bs-ride="true">
                <div class="carousel-inner carousel-products" style="height: 500px;">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach ($products->Store->Products->take(4) as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid shadow-sm">
                                    <div class="product-image">
                                        <a href="/products/{{ $product->slug }}" class="image">
                                            @if($product->image & $product->image1)
                                            <img class="img-1" src="/img/admin_store/{{ $product->image }}" width="500" height="500">
                                            <img class="img-2" src="/img/admin_store/{{ $product->image1 }}" width="500" height="500">
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
                                        <div class="price_ mt-2">Rp{{ number_format(($product->price * ((100 - $product->discount)/100)), 0,",",".") }}</div>
                                        <div class="small text-secondary text-decoration-line-through diskon">
                                            <sub class="mb-2">Rp{{ number_format($product->price, 0,",",".") }}</sub>
                                        </div>

                                        @else
                                        <div class="price_ mt-2">Rp{{ $product->price }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @foreach ($products->Store->Products->skip(4)->take(4) as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid shadow-sm">
                                    <div class="product-image">
                                        <a href="/products/{{ $product->slug }}" class="image">
                                            @if($product->image & $product->image1)
                                            <img class="img-1" src="/img/admin_store/{{ $product->image }}" width="500" height="500">
                                            <img class="img-2" src="/img/admin_store/{{ $product->image1 }}" width="500" height="500">
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
                                        <div class="price_ mt-2">Rp{{ number_format(($product->price * ((100 - $product->discount)/100)), 0,",",".") }}</div>
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
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @foreach ($products->Store->Products->skip(8)->take(4) as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid shadow-sm">
                                    <div class="product-image">
                                        <a href="/products/{{ $product->slug }}" class="image">
                                            @if($product->image & $product->image1)
                                            <img class="img-1" src="/img/admin_store/{{ $product->image }}" width="500" height="500">
                                            <img class="img-2" src="/img/admin_store/{{ $product->image1 }}" width="500" height="500">
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
                                        <div class="price_ mt-2">Rp{{ number_format(($product->price * ((100 - $product->discount)/100)), 0,",",".") }}</div>
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
                    </div>
                </div>
                <button class="carousel-control-prev ms-0" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next me-0" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Related Product --}}
    <div class="container my-5">
        <div class="container">
            <div class="h4 title mb-1">Related Products</div>
            <div id="carouselExampleIndicators2" class="carousel slide mb-0" data-bs-ride="true">
                <div class="carousel-inner carousel-products" style="height: 500px;">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach ($products->Category->Products->take(4) as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid shadow-sm">
                                    <div class="product-image">
                                        <a href="/products/{{ $product->slug }}" class="image">
                                            @if($product->image & $product->image1)
                                            <img class="img-1" src="/img/admin_store/{{ $product->image }}" width="500" height="500">
                                            <img class="img-2" src="/img/admin_store/{{ $product->image1 }}" width="500" height="500">
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
                                        <div class="price_ mt-2">Rp{{ number_format(($product->price * ((100 - $product->discount)/100)), 0,",",".") }}</div>
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
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @foreach ($products->Category->Products->skip(4)->take(4) as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid shadow-sm">
                                    <div class="product-image">
                                        <a href="/products/{{ $product->slug }}" class="image">
                                            @if($product->image & $product->image1)
                                            <img class="img-1" src="/img/admin_store/{{ $product->image }}" width="500" height="500">
                                            <img class="img-2" src="/img/admin_store/{{ $product->image1 }}" width="500" height="500">
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
                                        <div class="price_ mt-2">Rp{{ number_format(($product->price * ((100 - $product->discount)/100)), 0,",",".") }}</div>
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
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @foreach ($products->Category->Products->skip(8)->take(4) as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="product-grid shadow-sm">
                                    <div class="product-image">
                                        <a href="/products/{{ $product->slug }}" class="image">
                                            @if($product->image & $product->image1)
                                            <img class="img-1" src="/img/admin_store/{{ $product->image }}" width="500" height="500">
                                            <img class="img-2" src="/img/admin_store/{{ $product->image1 }}" width="500" height="500">
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
                                        <div class="price_ mt-2">Rp{{ number_format(($product->price * ((100 - $product->discount)/100)), 0,",",".") }}</div>
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
                    </div>
                </div>
                <button class="carousel-control-prev ms-0" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next me-0" type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection