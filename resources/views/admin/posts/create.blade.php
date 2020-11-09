<h2>Create Post</h2>

<div>
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th><label for="title">Post title</label></th>
                <th><input type="text" name="title"></th>
            </tr>
            <tr>
                <th><label for="content">Post content</label></th>
                <th><textarea name="content" > </textarea><br></th>
            </tr>
            <tr>
                <th><label for="category">Category</label></th>
                <th><select name="category" id="category">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </th>
            </tr>
            <tr>
                <th colspan="2"><button type="submit">Save</button></th>
            </tr>
        </table>
    </form>
</div>
