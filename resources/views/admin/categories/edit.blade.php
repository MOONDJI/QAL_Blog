<h2>Edit Category</h2>

<div>
    <form method="POST" action="{{route('admin.categories.update', $category->id)}}">
        @method('PUT')
        @csrf
        <table>
            <tr>
                <th><label for="name">Name category</label></th>
                <th><input type="text" name="name" value="{{$category->name}}"></th>
            </tr>
            <tr>
                <th><label for="description">Description category</label></th>
                <th><input type="text" name="description" value="{{$category->description}}"><br></th>
            </tr>
            <tr>
                <th colspan="2"><button type="submit">Save</button></th>
            </tr>
        </table>
    </form>
</div>
