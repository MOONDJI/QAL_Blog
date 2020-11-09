<h1>{{$title}}</h1>

<div>
    @foreach($posts as $key => $post)
    <div>
        <div>
            <h2> <a href="{{route('blog.post', $post->id)}}">{{$post->title}} #{{$key}}</a></h2>
            <p>Created at: <strong>{{$post->created_at}}</strong> in category: <strong>{{$post->categoryname}}</strong> by <strong>{{$post->username}}</strong></p>
        </div>
        <div>
            {{$post->content}}
        </div>
    </div>
    @endforeach
</div>

<div>
    <h1>Categories</h1>
    @foreach($categories as $category)
    <div>
        <h2><a href="{{route('blog.category', $category->id)}}">{{$category->name}}</a></h2>
        <p><strong>{{$category->created_at}}</strong></p>
        <p>{{$category->description}}</p>
    </div>
    @endforeach
</div>
