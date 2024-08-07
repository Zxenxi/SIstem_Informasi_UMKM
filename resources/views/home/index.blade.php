@extends('layouts.mylayout')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Kategori</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ url('/home/tambahcategory') }}">View
                        Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Produk</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ url('/home/tambahproducts') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Pemilik UMKM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ url('/home/add-customer') }}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('table')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <!-- Added this line -->
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemilik UMKM</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                    $count = 0;
                    @endphp

                    @foreach($categories as $category)
                    @php
                    $products = $category->products; // get associated products for this category
                    @endphp

                    @if(count($products) > 0)
                    @foreach($products as $product)
                    @php
                    $count++;
                    @endphp

                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ optional($product->customer)->name}}</td>
                        {{-- <td>{{ $product->customer->name }}</td> --}}

                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>Rp {{ number_format($product->price, 2, ',', '.') }}</td> <!-- Modified this line -->
                        <td>{{$category->name}}</td>
                        <td>
                            @if($product->image)
                            <!-- <img src="{{ asset('storage/'. $product->image ) }}" width="200" height="200"> -->
                            <img src="{{ Storage::url($product->image) }}" height="200" width="200" alt="" />
                            @else
                            No Image Available
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    @php
                    $count++;
                    @endphp

                    <tr>
                        <td>{{ $count }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{$category->name}}</td>
                        <td>-</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
</div>

@endsection