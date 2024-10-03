@extends('layouts.head-footer')

@section('product')
    <section class="section-basket">
        <div class="basket">
            <div class="title-basket">
                <h3 class="text-tilte-basket">سبد خرید شما</h3>
            </div>
            <div class="div-product-basket">
                <!-- <h2>سبد خرید شما</h2> -->

                @if(session('success'))
                    <p class="p-basket-list">{{ session('success') }}</p>
                @endif

                @if(count($cart) > 0)
                    <ul>
                        @foreach($cart as $item)
                            <li class="li-basket-list">
                                <div class="div-basket-detial">نام محصول
                                    <div class="div-name-detial">{{ $item['name'] }}</div>
                                </div>
                                <div class="div-basket-detial">قیمت
                                    <div class="div-name-detial">{{ number_format($item['price'],0) }}</div>
                                </div>
                                <div class="div-basket-detial">تعداد
                                    <div class="div-name-detial">{{ number_format($item['quantity'],0) }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>سبد خرید خالی است.</p>
                @endif
            </div>
            <div class="div-som-product">
                <div class="som">
                    <span class="som-price">{{ number_format($item['price'] * $item['quantity'],0) }}
                        <span class="title-price">تومان</span>
                    </span>
                </div>
                <div class="sell-price-basket">
                    <label for="sell" class="label-sell-input">کد تخفیف :</label>
                    <input type="text" class="input-sell-code" id="sell">
                </div>
                <button class="pay-btn" id="payButton">نهایی کردن سفارش</button>
                <div class="modal-bg" id="modalBg">
                    <div class="modal-content">
                        <button class="close-btn" id="closeButton">X</button>
                        <h2>مشخصات کاربر</h2>
                        <!-- <form id="userForm">
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی:</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">شماره تماس:</label>
                                <input type="text" id="email" name="number" required>
                            </div>
                            <div class="form-group">
                                <label for="address">آدرس:</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="address">کد پستی:</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            <button type="submit" class="pay-btn">پرداخت</button>
                        </form> -->
                        <!-- resources/views/cart.blade.php -->

                        @if(session('success'))
                        <div style="color: green;">
                            {{ session('success') }}
                        </div>
                        @endif
                        <p class="total-list">مقدار پرداخت: {{ number_format($item['price'] * $item['quantity'],0) }}</p>

                        <form action="{{ route('order.submit') }}" method="POST">
                            @csrf
                            <label for="name">نام و نام خانوادگی:</label>
                            <input type="text" name="name" required class="input-nahie"><br>

                            <label for="phone_number">شماره تماس:</label>
                            <input type="text" name="phone_number" required class="input-nahie"><br>

                            <label for="address">آدرس:</label>
                            <textarea name="address" required class="input-nahie"></textarea><br>

                            <label for="postal_code">کد پستی:</label>
                            <input type="text" name="postal_code" required class="input-nahie"><br>

                            <input type="hidden" name="product_name" value="{{ $item['name'] }}">
                            <input type="hidden" name="price" value="{{ $item['price'] }}">
                            <input type="hidden" name="quantity" value="{{ $item['quantity'] }}">
                            <input type="hidden" name="total" value="{{ $item['price'] * $item['quantity'] }}">

                            <button type="submit" class="btn-nahie">پرداخت و ثبت درخواست</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script>
        // دسترسی به عناصر
        const payButton = document.getElementById('payButton');
        const modalBg = document.getElementById('modalBg');
        const closeButton = document.getElementById('closeButton');
        const body = document.body;
    
        // باز کردن مودال
        payButton.addEventListener('click', function() {
            modalBg.style.display = 'flex';
            // body.classList.add('blur');
        });
    
        // بستن مودال
        closeButton.addEventListener('click', function() {
            modalBg.style.display = 'none';
            // body.classList.remove('blur');
        });
    
        // ارسال فرم
        const userForm = document.getElementById('userForm');
        userForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // اینجا می‌توانید داده‌های فرم را پردازش کنید
            alert('مشخصات با موفقیت ارسال شد!');
            modalBg.style.display = 'none';
            // body.classList.remove('blur');
        });
    </script>

@endsection
















<!-- resources/views/cart.blade.php -->

