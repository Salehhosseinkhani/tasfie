@extends('layouts.admin-layout')

@section('digiadmin')
    <section class="section-dastgah">
        <div class="div-som-product">
            <div class="div-dastgah">
                <div class="dev-title-dastgah">
                    <h2 class="title-dastgah">خرابی دستگاه ها و پشتیبانی</h2>
                </div>
                <div class="div-input-dastgah" id="productForm-dstgah">
                @if($data)
                    <p><strong>عنوان:</strong> {{ $data['title'] }}</p>
                    <p><strong>توضیحات:</strong> {{ $data['description'] }}</p>
                    <p><strong>شماره موبایل:</strong> {{ $data['mobile'] }}</p>
                    @else
                    <p>اطلاعاتی ثبت نشده است.</p>
                @endif
            </div>
        </div>
    </section>
@endsection