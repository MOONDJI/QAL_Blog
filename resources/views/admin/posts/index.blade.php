<div>
    <h1>Posts</h1>
    <h2><a href="{{route('admin.posts.create')}}">New post</a></h2>
    @foreach($posts as $post)
    <div>
        <h2><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></h2>
        <p>Created at: <strong>{{$post->created_at}}</strong></p>
        <table>
            <tr>
                <th><h3><a href="{{route('admin.posts.edit', $post->id)}}">Edit</a></h3></th>
                <th>
                    <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <h3><button type="submit">Delete</button></h3>
                    </form>
                </th>
            </tr>
        </table>
    </div>
    @endforeach
</div>
