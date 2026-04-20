<form method="POST" action="/products/{{ $product->id }}">
    @csrf
    @method('PATCH')
    <input type="text" name="name" value="{{ $product->name }}">
    <input type="number" name="price" value="{{ $product->price }}">
    <input type="number" name="stock" value="{{ $product->stock }}">

    <textarea name="description">{{ $product->description }}</textarea>

    <input type="number" name="category_id" value="{{ $product->category_id }}">

    <button type="submit">Update</button>
</form>
