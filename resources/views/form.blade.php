@extends('layouts.head-footer')

@section('product')
    <section class="support">
        <div class="div-suport">
            <div class="div-title-support">
                <h1 class="text-title-support">اعلام خرابی و پشتیبانی</h1>
            </div>
            <div class="box-support">
                    <form action="{{ route('submitForm') }}" method="POST">
                        @csrf
                        <div class="div-support">
                            <label for="title">عنوان :</label>
                            <input type="text" id="title" name="title" required class="input-support">
                        </div>
                        <div class="div-support">
                            <label for="description">توضیحات :</label>
                            <textarea id="description" name="description" required class="input-support"></textarea>
                        </div>
                        <div class="div-support">
                            <label for="mobile">شماره موبایل :</label>
                            <input type="text" id="mobile" name="mobile" required class="input-support-mobile">
                        </div>
                        <button type="submit" class="btn-support">ارسال</button>
                    </form>
                    
                    @if (session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
            </div>
        </div>
    </section>
@endsection