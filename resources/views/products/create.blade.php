<form method="POST" action="/products">
    @csrf

    <input type="text" name="name" placeholder="Name">
    <input type="number" name="price" placeholder="Price">
    <input type="number" name="stock" placeholder="Stock">

    <textarea name="description"></textarea>

    <button type="submit">Add Product</button>
</form>
