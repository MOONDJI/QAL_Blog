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
                    <th>{{$category->name}}</th>
                    <th><button>Edit</button></th>
                    <th><button>Delete</button></th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
