<h2>Create Post</h2>

<div>
    <form method="POST" action="{{route('admin.posts.update', $post->id)}}">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <th><label for="title">Post title</label></th>
                <th><input type="text" name="title" value="{{$post->title}}"></th>
            </tr>
            <tr>
                <th><label for="content">Post content</label></th>
                <th><textarea name="content" >{{$post->content}}</textarea><br></th>
            </tr>
            <tr>
                <th><label for="category">Category</label></th>
                <th><select name="category" id="category">
                        @foreach($categories as $category)
                            @if($category->id == $post->category_id)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
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
