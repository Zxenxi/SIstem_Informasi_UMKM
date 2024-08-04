@extends('layouts.userlayout')

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
    <div class="row">
        <div class="col-md-6">
            <!-- Image display code here -->
            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                class="w-100 h-200 object-fit-cover"/>
        </div>
        <div class="col-md-6">
            <h2 class="menu-title text-dark mt-3">{{ $product->name }}</h2>
            {{-- <h2 class="menu-title text-dark mt-3">owner :{{ $customers->name}}</h2> --}}
            <p class="text-desc-menu mt-2">{{ $product->description }}</p>
            <h4 class="text-primary fw-bold mt-4">Rp {{ number_format($product->price, 2, ',', '.') }}</h4>
            {{-- <h4 class="text-primary fw-bold mt-4">Rp{{ $product->price }}</h4> --}}
            </ul> 
            <a href="https://wa.me/{{ $phone_number }}" class="btn btn-primary">Pesan Sekarang</a>
        </div>
    </div>
</div>


@endsection