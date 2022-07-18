@extends('customer.main')

@section('container')
<div>
    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 title">About Foresell</h1>
                <p class="lead text-muted mb-0">Foresell adalah platform Multi-vendor marketplace yang dibuat menggunakan Framework Laravel, dibuat oleh Muhammad Fadhil, Muhammad Yazid Baihaqi dan Muhammad Mubarok Azzam. </p>
            </div>
            <div class="col-lg-6 d-none d-lg-block"><img src="{{ asset('img/customer/about1.gif') }}" alt="" class="img-fluid"></div>
        </div>
    </div>
</div>

<div>
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 px-5"><img src="{{ asset('img/customer/about3.png') }}" width="700" height="700" alt="" class="img-fluid mb-4 mb-lg-0"></div>
            <div class="col-lg-6 text-start">
                <h2 class="font-weight-light title">Multi-vendor Marketplace</h2>
                <p class="font-italic text-muted mb-4">Multi-vendor marketplace adalah platform yang memungkinkan banyak vendor atau penjual untuk membuat toko online atau profil mereka sendiri dan memasang produk untuk dijual.</p>
            </div>
        </div>
        <div class="row align-items-center ">
            <div class="col-lg-6 order-2 order-lg-1 text-end">
                <h2 class="font-weight-light title">Our Service</h2>
                <p class="font-italic text-muted mb-4">Foresell menawarkan transaksi jual beli online yang menyenangkan dan terpercaya. Ayo bergabung dengan mulai mendaftarkan produk jualan dan berbelanja berbagai penawaran menarik kapan saja, di mana
                    saja dan tentu saja Keamanan transaksi kamu terjamin.</p>
            </div>
            <div class="col-lg-6 px-5 mx-auto order-1 order-lg-2"><img src="{{ asset('img/customer/about2.png') }}" width="700" height="700" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        </div>
    </div>
</div>

<div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="display-5 title text-center">Our team</h2>
                <p class="font-italic text-muted text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>

        <div class="d-flex justify-content-around text-center">
            <div class="col-xl-3 col-sm-6">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-1">Muhammad Fadhil</h5>
                    <span class="small text-muted">Mahasiswa UAI</span>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/muhammad-fadhil-/" class="social-link"><i class='bx bxl-linkedin-square'></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/fadhil_7706/" target="_blank" class="social-link"><i class='bx bxl-instagram-alt'></i></a></li>
                        <li class="list-inline-item"><a href="mailto:mfadhilgva12@gmail.com" target="_blank" class="social-link"><i class='bx bxl-gmail'></i></a></li>
                        <li class="list-inline-item"><a href="http://muhammadfadhil.me/" target="_blank" class="social-link"><i class='bx bxl-blogger'></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-2.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-1">Muhammad Yazid Baihaqi</h5>
                    <span class="small text-muted">Mahasiswa UAI</span>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="#" target="_blank" class="social-link"><i class='bx bxl-linkedin-square'></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" class="social-link"><i class='bx bxl-instagram-alt'></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" class="social-link"><i class='bx bxl-gmail'></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" class="social-link"><i class='bx bxl-blogger'></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-1">Muhammad Azzam</h5>
                    <span class="small text-muted">Mahasiswa UAI</span>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="#" target="_blank" class="social-link"><i class='bx bxl-linkedin-square'></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" class="social-link"><i class='bx bxl-instagram-alt'></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" class="social-link"><i class='bx bxl-gmail'></i></a></li>
                        <li class="list-inline-item"><a href="#" target="_blank" class="social-link"><i class='bx bxl-blogger'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection