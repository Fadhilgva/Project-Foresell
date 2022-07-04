<div class="sticky-bottom" id="footer">
    <nav class="navbar navbar-expand-lg navbar-light navbar-foresell pt-4 pb-1">
        <div class="container">
            <div class="me-auto">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/customer/foresell.png') }}" alt="Foresell" width="150">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="col-md-8 ms-5">
                    @if (request ()->segment(1) == '')
                    <form action="/products">
                        @elseif (Request::is ('products'))
                        <form action="/products">
                            @elseif (Request::is ('categories'))
                            <form action="/categories">
                                <input type="hidden" name="category" value="{{ request('category') }}">
                                @elseif (Request::is ('stores'))
                                <form action="/stores">
                                    <input type="hidden" name="store" value="{{ request('store') }}">
                                    @endif
                                    {{-- @csrf --}}
                                    <div class="d-flex form-inputs">
                                        <button class="btn border-0" type="submit"><i class="bx bx-search"></i></button>
                                        <input type="text" class="form-control" placeholder="Search any product..." name="search" value="{{ request('search') }}">
                                    </div>
                                </form>
                </div>
                <div class="ms-auto">
                    <ul class="navbar-nav">
                        @auth
                        <li class="navbar-item">
                            <a class="nav-link border-0 ms-auto me-3
                                {{  Request::is ('cart') ? 'active' : '' }}" href="/cart">
                                <img src="{{ asset('img/customer/bx-cart.svg') }}" class="d-inline-block align-text" alt="" width="30"> Cart
                            </a>
                        </li>
                        <li class="navbar-item dropdown">
                            <a class="nav-link dropdown-toggle 
                            {{  Request::is ('profile') ? 'active' : '' }}" href="/profile" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/customer/bx-user.svg') }}" class="d-inline-block align-text-center" alt="" width="30"> {{ Auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="mb-2">
                                    <a class="dropdown-item" href="/profile">
                                        <img src="{{ asset('img/customer/bx-edit-alt.svg') }}" class="d-inline-block align-text" alt="" width="20"> Profile
                                    </a>
                                </li>
                                <li class="my-2">
                                    <a class="dropdown-item" href="/wishlist">
                                        <img src="{{ asset('img/customer/bx-heart.svg') }}" class="d-inline-block align-text" alt="" width="20"> Wishlist
                                    </a>
                                </li>
                                <li class="my-2">
                                    <a class="dropdown-item" href="/orders">
                                        <img src="{{ asset('img/customer/bx-receipt.svg') }}" class="d-inline-block align-text" alt="" width="20"> Orders
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button class="dropdown-item">
                                            <img src="{{ asset('img/customer/bx-log-out.svg') }}" class="d-inline-block align-text" alt="" width="20"> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endauth
                        @guest
                        <li class="navbar-item">
                            <a class="nav-link me-3
                                {{  Request::is ('cart') ? 'active' : '' }}" href="/cart">
                                <img src="{{ asset('img/customer/bx-cart.svg') }}" class="d-inline-block align-text" alt="" width="30"> Cart
                            </a>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link
                                {{  Request::is ('profile') ? 'active' : '' }}" href="/login">
                                <img src="{{ asset('img/customer/bx-user.svg') }}" class="d-inline-block align-text" alt="" width="25"> Account
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light navbar-foresell shadow-sm h-25">
        <div class="container">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link me-md-3 fw-semi-bold
                            {{  request ()->segment(1) == '' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-3
                            {{  Request::is ('products') ? 'active' : '' }}" href="/products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-3
                            {{ Request::is ('allcategories') ? 'active' : '' }}" href="/allcategories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-3
                            {{  Request::is ('about') ? 'active' : '' }}" href="/about">About</a>
                </li>
            </ul>
            @guest
            <a class="navbar-item me-2 pt-5">
                <a class="btn btn-outline-dark me-2" href="/login">Login</a>
            </a>
            <a class="navbar-item me-2 pt-5">
                <a class="btn btn-dark me-2" href="/register">Register</a>
            </a>
            @endguest
        </div>
    </nav>
</div>