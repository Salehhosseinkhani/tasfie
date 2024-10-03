@extends('layouts.admin-layout')

@section('digiadmin')

<div class="div-mghale-admin">
    <form action="{{ route('article.store') }}" class="form-mghale" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="description">توضیحات:</label>
            <textarea id="description" name="description" required class="input-mghale"></textarea>
        </div>
        <div>
            <label for="image">عکس:</label>
            <input type="file" id="image" name="image" required class="input-mghale">
        </div>
        <button type="submit">ذخیره</button>
    </form>
</div>

@endsection