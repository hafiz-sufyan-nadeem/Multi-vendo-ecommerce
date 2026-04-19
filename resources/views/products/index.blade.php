<h1>Products List</h1>

<a href="/products/create">Add Product</a>

@foreach($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }}</p>
        <p>{{ $product->stock }}</p>
    </div>
@endforeach
