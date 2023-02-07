<form method="POST" action="/iform">
    {{ csrf_field() }}
    <label for="name">Category Name</label>
    <input name="name" id="name">
    <br>

    <label for="slug">Slug</label>
    <input name="slug" id="slug">
    <br>
    <input type="submit">
</form>
