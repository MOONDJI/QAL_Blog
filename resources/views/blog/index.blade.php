<h1>{{$title}}</h1>

@foreach($posts as $key => $post)
<div>
    <div>
        <h2> <a href="{{route('blog.post.show', $post->id)}}">{{$post->title}} #{{$key}}</a></h2>
        <p>Created at: <strong>{{$post->created_at}}</strong> in category: <strong>{{$post->categoryname}}</strong> by <strong>{{$post->username}}</strong></p>
    </div>
    <div>
        {{$post->content}}
    </div>
</div>
@endforeach
