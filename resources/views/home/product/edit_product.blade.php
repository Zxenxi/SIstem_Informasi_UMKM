@extends('layouts.mylayout')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
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

<form method="POST" action="/updateproduct/{{ $product->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $product->id }}">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h4>Edit Product</h4>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
    <label for="price">Harga</label>
    <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
    <label for="category_id">Jenis Kategori</label>
    <br>
    <select name="category_id" id="category_id">
        <option value="">Select a Category</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ?
            'selected' :
            '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="customer_id">Pemilik UMKM</label>
    <br>
    <select name="customer_id" id="customer_id">
        <option value="">Select a Customer</option>
        @foreach ($customer as $customer)
        <option value="{{ $customer->id }}" {{ old('customer_id', $product->customer_id) == $customer->id ?
            'selected' : '' }}>{{ $customer->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="description">Deskripsi</label>
    <br>
    {{-- <textarea class="form-control" name="description" id="description" cols="10" rows="4"></textarea> --}}
    <textarea class="form-control" name="description" id="description" cols="10"
        rows="4">{{ old('description',$product->description) }}</textarea>

    <br>
    <div class="form-group">
        <label for="image">Gambar</label><br>
        {{-- <img src="{{ asset('storage/'. $product->image ) }}" width="200" height="200"> --}}
        <img src="{{ Storage::url($product->image) }}" width="200" height="200"> 

        <!-- {{-- <img src="{{ Storage::url($product->image) }}" height="200" width="200"> --}} -->
        <input type="file" accept="image/*" name="image" id="image" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary -mb-2 mt-2">Update</button>
</form>

{{-- <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Kategori
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>gambar</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>

            </tbody>
        </table>
    </div>
</div> --}}

@endsection