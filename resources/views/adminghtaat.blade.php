@extends('layouts.admin-layout')

@section('digiadmin')
    <section class="section-dastgah">
        <div class="div-som-product">
            <div class="div-dastgah">
                <div class="dev-title-dastgah">
                    <h2 class="title-dastgah">قطعات دستگاه ها</h2>
                </div>
                <div class="div-input-dastgah" id="productForm-dstgah">
                    @if(session('success'))
                        <div>{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('ghtaats.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <label>نام محصول :</label>
                        <input type="text" name="name" required><br>

                        <label>توضیحات :</label>
                        <input type="text" name="description" required><br>

                        <label>قیمت :</label>
                        <input type="number" name="price" required><br>

                        <label>قیمت با تخفیف :</label>
                        <input type="number" name="sellprice" required><br>

                        <label>عکس محصول:</label>
                        <input type="file" name="image" required><br>

                        <button type="submit">اضافه کردن</button>
                    </form>
                    <h2>لیست محصولات</h2>
                    <div class="div-show-product-admin">
                        @foreach($ghtaats as $ghtaat)
                            <div class="product-admin-show">
                                <img src="{{ asset('storage/' . $ghtaat->image) }}" class="image-digiadmin">
                                <p>{{ $ghtaat->name }}</p>
                                <form action="{{ route('ghtaats.destroy', $ghtaat->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-digiadmin">حذف</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection