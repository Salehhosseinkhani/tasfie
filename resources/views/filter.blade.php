@extends('layouts.head-footer')

@section('product')
<section class="section-box-product">
        <div class="div-box-product" id="box-product">
            <div class="title-box-product">
                <h1 class="title-text-box-product">فیلتر ها</h1>
            </div>
            <div class="box-product-all">
            @foreach($filters as $filter)
                        
                            <div class="box-product-one">
                                <img src="{{ asset('storage/' . $filter->image) }}" alt="{{ $filter->name }}" class="image-box-product">
                                <h2 class="name-box-product">{{ $filter->name }}</h2>
                                <p class="span-price">{{ number_format($filter->price,0) }}
                                    <span class="title-price">تومان</span>
                                </p>
                                <p class="sell-price">{{ number_format($filter->sellprice,0) }}
                                    <span class="title-price">تومان</span>
                                </p>
                                <a href="{{ route('filter.new', $filter->slug) }}"><button class="btn-blade">جزئیات بیشتر</button></a>
                            </div>
            @endforeach
            </div>
        </div>
    </section>
@endsection