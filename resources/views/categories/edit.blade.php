<form method="POST" action="/categories/{{ $category->id }}">
    @csrf
    @method('PATCH')

    <input type="text" name="name" value="{{ $category->name }}">

    <textarea name="description">{{ $category->description }}</textarea>

    <button type="submit">Update</button>
</form>
