@extends('layouts.admin-layout')

@section('digiadmin')
    <section class="section-jashnvare">
        <form action="{{ route('admin.jashnvare.store') }}" method="POST" enctype="multipart/form-data" class="form-jashnvare">
        @csrf
            <div>
                <label for="name">اسم جشنواره:</label>
                <input type="text" id="name" name="name" required class="input-jashnvare">
            </div>
            <div>
                <label for="description">توضیحات جشنواره:</label>
                <textarea id="description" name="description" required class="input-jashnvare"></textarea>
            </div>
            <div>
                <label for="image">عکس جشنواره:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit">ذخیره</button>
        </form>
    </section>
@endsection















