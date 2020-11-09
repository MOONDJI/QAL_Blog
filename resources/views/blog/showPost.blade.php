<h1>{{$title}}</h1>
<div>
    <div>
        <h2>{{$post->title}}</h2>
        <p>Created at: <strong>{{$post->created_at}}</strong> in category: <strong>{{$post->categoryname}}</strong> by <strong>{{$post->username}}</strong></p>
    </div>
    <div>
        {{$post->content}}
    </div>
</div>
