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
                <th><select name="category_id" id="category_id">
                        @foreach($categories as $id => $category)
                            <option value="{{$id}}">{{$category}}</option>
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


 {{-- @foreach($categories as $i => $category)
    <p> {{$i}} => {{$category}} </p>
@endforeach --}}
