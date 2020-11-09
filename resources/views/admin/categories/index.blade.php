<div>
    <h1>Categories</h1>

    <h2><a href="{{route('admin.categories.create')}}">New category</a></h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th><a href="{{route('admin.categories.show', $category->id)}}">{{$category->name}}</a></th>
                    <th><a href="{{route('admin.categories.edit', $category->id)}}">Edit</a></th>
                    <th>
                        <form method="POST" action="{{route('admin.categories.destroy', $category->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
