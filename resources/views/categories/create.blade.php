@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif

<form method="POST" action="/categories">
    @csrf

    <input type="text" name="name" placeholder="Name">
    <textarea name="description"></textarea>
    <input type="image" name="image" placeholder="Image">



    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Add Category</button>
</form>
