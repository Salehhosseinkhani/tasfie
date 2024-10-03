@extends('layouts.head-footer')

@section('product')
    <section class="section-image">
        <div class="background-slider">
            <div class="content">
                @php
                    $jashnvare = App\Models\Jashnvare::latest()->first();
                @endphp
                @if($jashnvare)
                <div class="content-title  jashnvare-box">
                    <h1 class="title-text-image">{{ $jashnvare->name }}</h1>
                    <p class="title-p-image">{{ $jashnvare->description }}</p>
                    <a href="" class="link-content-image"><button class="btn-content-image">جزئیات بیشتر</button></a>
                </div>
                <div class="content-image">
                    <img src="{{ asset('images/' . $jashnvare->image) }}" alt="{{ $jashnvare->name }}" class="jashnvare-image">
                </div>
                    <div class="jashnvare-box">
                        <h2></h2>
                        <p></p>
                        
                    </div>
                @endif
            </div>
            <div class="box-container">
                <a href="/#box-product" class="box">
                    <img src="./image/filter_10138064.png" alt="Icon 1">
                    <p class="p-box-container">تصفیه آب</p>
                </a>
                <a href="/filter" class="box">
                    <img src="./image/recycle-water_16315486.png" alt="Icon 2">
                    <p class="p-box-container">فیلتر ها</p>
                </a>
                <a href="/yakhchal" class="box">
                    <img src="./image/water-filter_12367250.png" alt="Icon 3">
                    <p class="p-box-container">فیلتر یخچال</p>
                </a>
                <a href="/ghtaat" class="box">
                    <img src="./image/water-filter_5401833.png" alt="Icon 4">
                    <p class="p-box-container">قطعات تصفیه آب</p>
                </a>
                <a href="/sard" class="box">
                    <img src="./image/water-purifier_17407237.png" alt="Icon 5">
                    <p class="p-box-container">وسایل آب سرد کن</p>
                </a>
            </div>
        </div>
    </section>
    <section class="section-platform-image">
        <div class="div-palatform-image">
            
        </div>
    </section>
    <section class="section-text-box">
        <div class="div-text-box">
        @php
            $article = App\Models\Article::latest()->first();
        @endphp

        @if($article)
            <div class="text-paragraf">
                <p class="p-text-paragraf">{{ $article->description }}</p>
            </div>
            <div class="div-video-paragraf">
                <img src="{{ asset('images/' . $article->image) }}" alt="article image" class="vide-paragraf">
            </div>
        @endif
        </div>
    </section>
    <section class="section-box-product">
        <div class="div-box-product" id="box-product">
            <div class="title-box-product">
                <h1 class="title-text-box-product">تصفیه آب تقی زاده</h1>
            </div>
            <div class="box-product-all">
                @foreach($products as $product)
                        <div class="box-product-one">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="image-box-product">
                            <h2 class="name-box-product">{{ $product->name }}</h2>
                            <p class="span-price">{{ number_format($product->price,0) }}
                                <span class="title-price">تومان</span>
                            </p>
                            <p class="sell-price">{{ number_format($product->sellprice,0) }}
                                <span class="title-price">تومان</span>
                            </p>
                            <a href="{{ route('product.show', $product->slug) }}"><button class="btn-blade">جزئیات بیشتر</button></a>
                        </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- <section class="section-text-box">
        <div class="div-text-box">
        @if($article)
            <div>
                <h2>توضیحات:</h2>
                <p>{{ $article->description }}</p>
            </div>
            <div>
                <h2>عکس:</h2>
                <img src="{{ asset('images/' . $article->image) }}" alt="article image" style="width: 300px; height: auto;">
            </div>
        @endif
        </div>
    </section> -->
    <section class="transfer">
        <div class="div-transfer">
            <div class="div-title-transfer">
                <h2 class="title-transfer">تصفیه آب تقی زاده فروش برترین برندهای دستگاه تصفیه آب خانگی با تخفیف ویژه </h2>
            </div>
            <div class="transfer-product-all">
                <div class="transfer-product">
                    <img src="./image/10.jpg" alt="" class="image-transfer">
                    <h3 class="description-transfer">ارسال و نصب رایگان</h3>
                    <p class="p-transfer">ارسال و نصب رایگان تصفیه آب در سراسر كشور با بیش از پنجاه نمایندگى</p>
                </div>
                <div class="transfer-product">
                    <img src="./image/9.jpg" alt="" class="image-transfer">
                    <h3 class="description-transfer">٢٤ ماه گارانتى</h3>
                    <p class="p-transfer">٢٤ ماه گارانتى طلایى محصولات</p>
                </div>
                <div class="transfer-product">
                    <img src="./image/onlinesupport_1.jpg" alt="" class="image-transfer">
                    <h3 class="description-transfer">خدمات پس از فروش</h3>
                    <p class="p-transfer">خدمات پس از فروش مادام العمر به همراه تامین قطعات و اطلاع رسانى تعویض فیلتر</p>
                </div>
            </div>
        </div>
    </section>
@endsection