<h1>Category List</h1>

    <a href="/categories/create">Add Category</a>
@foreach($categories as $category)

    <a href="/categories/{{ $category->id }}/edit">Edit</a>

        <form method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <div>
            <h3>{{ $category->name }}</h3>
            <p>{{ $category->description }}</p>
            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}" width="100">
            @endif
    </div>
@endforeach
