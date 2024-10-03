<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تصفیه ده تقی زاده</title>

    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <section class="head">
        <div class="div-head">
            <div class="div-title-head">
                <h1 class="title-head">پنل ادمین</h1>
            </div>
            <div class="div-image-head">
                <img src="./image/logo2.png" alt="" class="image-head">
            </div>
        </div>
    </section>
    <div class="div-dastgah bgc">
        <div class="dev-title-dastgah">
            <h2 class="title-dastgah">محصولات فیلتر ها</h2>
        </div>
        <div class="div-input-dastgah">
        <div class="div-input-dastgah" id="productForm-dstgah">
            @if(session('success'))
                <div>{{ session('success') }}</div>
            @endif

            <form action="{{ route('filters.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Name:</label>
                <input type="text" name="name" required><br>

                <label>Description:</label>
                <input type="text" name="description" required><br>

                <label>Price:</label>
                <input type="number" name="price" required><br>

                <label>Sell Price:</label>
                <input type="number" name="sellprice" required><br>

                <label>Image:</label>
                <input type="file" name="image" required><br>

                <button type="submit">Add Filter Product</button>
            </form>

            <h2>Filter Products List</h2>
            @foreach($filterProducts as $filterProduct)
                <div>
                    <img src="{{ asset('storage/' . $filterProduct->image) }}" width="100">
                    <p>{{ $filterProduct->name }}</p>
                    <form action="{{ route('filters.destroy', $filterProduct->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach     
        </div>
    </div>
    <script src="./js/welcome.js"></script>
</body>
</html>

