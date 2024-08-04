@extends('layouts.userlayout')
{{-- <nav class=" navbar navbar-expand-lg sticky-top bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logo.svg') }}" class="me-3" alt="brand" />
            <span class="text-dark">Tangkisan|UMKM</span>
        </a>    
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="bx bx-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{ route('dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Product</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @yield('navcategory')

                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('mainCategory') }}">Lihat semua Kategori</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#newslatter">Kontak Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
@section('navcategory')
@foreach ($category as $item)
<li>
    <a class="dropdown-item" href="{{ url('/categories/'.$item->id) }}">{{
        $item->name}}</a>
</li>
@endforeach
@endsection

@section('content')
    <div class="container">
        <form class="form" method="get" action="{{ route('search') }}">
            <div class="form-group w-100 mb-3">
                <label for="search" class="d-block mr-2">Pencarian</label>
                <input type="text" name="search" class="form-control w-75 d-inline" id="search"
                    placeholder="Masukkan keyword">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </div>
        </form>
        <span class="text-primary">Product</span>
        <h2 class="fw-bold text-dark mt-3">Pilih product kita!</h2>
        <div class="d-flex flex-wrap justify-content-center justify-content-lg-start">
            @foreach ($products as $product)
            <div class="card-menu bg-white mt-3 mx-2" data-aos="fade-up" data-aos-duration="1000">
                <a href="/details/{{ $product->id }}">
                    <div class="item">
                        <img src="{{ Storage::url($product->image) }}"alt="{{ $product->name }}" 
                            class="w-100 h-200 object-fit-cover" />
                        <h5 class="menu-title text-dark mt-3">{{ $product->name }}</h5>
                        <div class="card-menu__description-container">
                            <p class="text-desc-menu mt-2">{{ $product->description }}</p>
                        </div>
                        {{-- <h4 class="text-primary fw-bold mt-4">Rp{{ $product->price }}</h4> --}}
                        <h4 class="text-primary fw-bold mt-4">Rp {{ number_format($product->price, 2, ',', '.') }}</h4>
                        <a href="https://wa.me/{{ $product->phone_number }}"
                            class="btn btn-cart shadow-none text-white bg-primary">
                            <i class="bx bx-cart fs-5"></i>
                        </a>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection