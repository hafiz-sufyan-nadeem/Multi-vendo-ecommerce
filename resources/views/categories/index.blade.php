<h1>Category List</h1>

    <a href="/categories/create">Add Product</a>
@foreach($categories as $category)

        <a href="/products/{{ $category->id }}/edit">Edit</a>

        <form method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <div>
        <h3>{{ $category->name }}</h3>
        <p>{{ $category->description }}</p>
    </div>
@endforeach
