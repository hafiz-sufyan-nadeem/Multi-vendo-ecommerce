@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif

<form method="POST" action="/categories" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Name">
    <textarea name="description"></textarea>
    <input type="file" name="image" placeholder="Image">



    <button type="submit">Add Category</button>
</form>
