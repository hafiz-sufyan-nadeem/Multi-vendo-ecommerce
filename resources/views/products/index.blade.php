<h1>Products List</h1>

<a href="/products/create">Add Product</a>
@foreach($products as $product)
    <a href="/products/{{ $product->id }}/edit">Edit</a>
    <form method="POST" action="/products/{{ $product->id }}">
        @csrf
        @method('DELETE')
        <button onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }}</p>
        <p>{{ $product->stock }}</p>
        <p>{{ $product->description }}</p>
        <p>{{ $product->category->name }}</p>
    </div>
@endforeach
