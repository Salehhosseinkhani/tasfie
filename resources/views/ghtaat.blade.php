@extends('layouts.head-footer')

@section('product')
<section class="section-box-product">
        <div class="div-box-product" id="box-product">
            <div class="title-box-product">
                <h1 class="title-text-box-product">قطعات تصفیه آب</h1>
            </div>
            <div class="box-product-all">
        @foreach($ghtaats as $ghtaat)
                <div class="box-product-one">
                        <img src="{{ asset('storage/' . $ghtaat->image) }}" alt="{{ $ghtaat->name }}" class="image-box-product">
                    <h2 class="name-box-product">{{ $ghtaat->name }}</h2>
                    <p class="span-price">{{ number_format($ghtaat->price,0) }}
                        <span class="title-price">تومان</span>
                    </p>
                    <p class="sell-price">{{ number_format($ghtaat->sellprice,0) }}
                        <span class="title-price">تومان</span>
                    </p>
                    <a href="{{ route('ghtaat.add', $ghtaat->slug) }}"><button class="btn-blade">جزئیات بیشتر</button></a>
                </div>
        @endforeach
    </div>
@endsection