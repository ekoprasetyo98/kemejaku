@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul class="navbar-nav">
            <?php if($pesanan = \App\Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first()): ?>
            
            <?php if($notif = \App\PesananDetail::where('pesanan_id',0)->count()):?>
                <li class="nav-item">
                    <a class="nav-link ml-3" href="/keranjang"><i class="bi bi-cart-plus"></i>0</a>
                </li>
            <?php elseif($notif = \App\PesananDetail::where('pesanan_id',$pesanan->id)->count()):?>
                <li class="nav-item">
                    <a class="nav-link ml-3" href="/keranjang"><i class="bi bi-cart-plus"></i><sup>{{$notif}}</sup></a>
                </li>
            <?php else :?>
                <li class="nav-item">
                    <a class="nav-link ml-3" href="/keranjang"><i class="bi bi-cart-plus"></i></a>
                </li>
                
                
            <?php endif?>
            <?php elseif($pesanan = \App\Pesanan::where('user_id',Auth::user()->id == null)->where('status',0)->first()):?>
                <b>Kosong</b>
            <?php endif?>
            </ul>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="https://static.vecteezy.com/system/resources/previews/004/299/835/original/online-shopping-on-phone-buy-sell-business-digital-web-banner-application-money-advertising-payment-ecommerce-illustration-search-free-vector.jpg" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="https://static.vecteezy.com/system/resources/previews/004/299/835/original/online-shopping-on-phone-buy-sell-business-digital-web-banner-application-money-advertising-payment-ecommerce-illustration-search-free-vector.jpg" class="d-block w-100 img-fluid" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="https://static.vecteezy.com/system/resources/previews/004/299/835/original/online-shopping-on-phone-buy-sell-business-digital-web-banner-application-money-advertising-payment-ecommerce-illustration-search-free-vector.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        {{-- </div>
        <div class="col-md-8">
            
                    @if (session('status'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil Login!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                
        </div> --}}
    </div>
    <div class="produk mt-5">
        <h3 class="text-center">Produk Kami</h3>

        <div class="row justify-content-around">
            @foreach ($data as $d)
    
                <div class="card mt-4" style="width: 16rem;">
                    <img src="assets/{{$d->gambar}}" height="300" style="object-fit: cover" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$d->nama_barang}}</h5>
                        <div class="price d-flex justify-content-between">
                            <p class="card-text">Rp. {{number_format($d->harga)}}</p>
                            <b><i class="bi bi-bag-check-fill"></i> {{$d->stok}}</b>
    
                        </div>
                        <a href="/pesan/barang/{{$d->id}}" class="btn btn-warning w-100"><i class="bi bi-cart-plus"></i> Pesan Sekarang</a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
            
</div>
@endsection
