@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif

<form method="POST" action="/products" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Name">
    <input type="number" name="price" placeholder="Price">
    <input type="number" name="stock" placeholder="Stock">
    <input type="file" name="image">

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
