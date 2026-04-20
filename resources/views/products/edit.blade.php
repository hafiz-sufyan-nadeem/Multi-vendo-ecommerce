<form method="POST" action="/products/{{ $product->id }}">
    @csrf
    @method('PATCH')
    <input type="text" name="name" value="{{ $product->name }}">
    <input type="number" name="price" value="{{ $product->price }}">
    <input type="number" name="stock" value="{{ $product->stock }}">

    <textarea name="description">{{ $product->description }}</textarea>

    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>
