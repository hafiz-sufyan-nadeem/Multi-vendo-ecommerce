@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif

<form method="POST" action="/products">
    @csrf

    <input type="text" name="name" placeholder="Name">
    <input type="number" name="price" placeholder="Price">
    <input type="number" name="stock" placeholder="Stock">

    <textarea name="description"></textarea>

    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Add Product</button>
</form>
