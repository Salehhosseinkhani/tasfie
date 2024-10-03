
<div>
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Sell Price: {{ $product->sellprice }}</p>
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="300">
</div>