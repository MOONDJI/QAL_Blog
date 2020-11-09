<h2>Create Category</h2>

<div>
    <form action="admin/categories" method="POST">
        @csrf
        <table>
            <tr>
                <th><label for="name">Name category</label></th>
                <th><input type="text" name="name"></th>
            </tr>
            <tr>
                <th><label for="description">Description category</label></th>
                <th><input type="text" name="description" ><br></th>
            </tr>
            <tr>
                {{-- <th colspan="2"><button type="submit">Save</button></th> --}}
                <th colspan="2"><a type="submit" href="{{route('admin.categories.store')}}">Save</a></th>
            </tr>
        </table>
    </form>
</div>
