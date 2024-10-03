@extends('layouts.head-footer')

@section('product')
<section class="section-box-product">
        <div class="div-box-product" id="box-product">
            <div class="title-box-product">
                <h1 class="title-text-box-product">فیلتر یخچال</h1>
            </div>
            <div class="box-product-all">
        @foreach($yakhchals as $yakhchal)
                <div class="box-product-one">
                        <img src="{{ asset('storage/' . $yakhchal->image) }}" alt="{{ $yakhchal->name }}" class="image-box-product">
                    <h2 class="name-box-product">{{ $yakhchal->name }}</h2>
                    <p class="span-price">{{ number_format($yakhchal->price,0) }}
                        <span class="title-price">تومان</span>
                    </p>
                    <p class="sell-price">{{ number_format($yakhchal->sellprice,0) }}
                        <span class="title-price">تومان</span>
                    </p>
                    <a href="{{ route('yakhchal.one', $yakhchal->slug) }}"><button class="btn-blade">جزئیات بیشتر</button></a>
                </div>
        @endforeach
    </div>
@endsection