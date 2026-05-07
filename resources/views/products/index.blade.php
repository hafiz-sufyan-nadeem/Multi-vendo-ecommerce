<h1>Products List</h1>

@if(auth()->user()->role == 'vendor' || auth()->user()->role == 'admin')
    <a href="/products/create">Add Product</a>
@endif
@foreach($products as $product)
    @if(
     (auth()->user()->role == 'vendor' && $product->vendor_id == auth()->id())
     || auth()->user()->role == 'admin'
 )
        <a href="/products/{{ $product->id }}/edit">Edit</a>

        <form method="POST" action="/products/{{ $product->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endif
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->price }}</p>
        <p>{{ $product->stock }}</p>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="100">
        @endif
        <p>{{ $product->description }}</p>
        <p>{{ $product->category->name }}</p>
    </div>
@endforeach
