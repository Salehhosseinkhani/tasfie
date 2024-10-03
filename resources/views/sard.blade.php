@extends('layouts.head-footer')

@section('product')
<section class="section-box-product">
        <div class="div-box-product" id="box-product">
            <div class="title-box-product">
                <h1 class="title-text-box-product">وسایل آب سرد کن</h1>
            </div>
            <div class="box-product-all">
        @foreach($sards as $sard)
                <div class="box-product-one">
                        <img src="{{ asset('storage/' . $sard->image) }}" alt="{{ $sard->name }}" class="image-box-product">
                    <h2 class="name-box-product">{{ $sard->name }}</h2>
                    <p class="span-price">{{ number_format($sard->price,0) }}
                        <span class="title-price">تومان</span>
                    </p>
                    <p class="sell-price">{{ number_format($sard->sellprice,0) }}
                        <span class="title-price">تومان</span>
                    </p>
                    <a href="{{ route('sard.tow', $sard->slug) }}"><button class="btn-blade">جزئیات بیشتر</button></a>
                </div>
        @endforeach
    </div>
@endsection