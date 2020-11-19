<div>
    <h1>Show post {{$post->id}}</h1>
    <h2>{{$post->title}}</h2>
    <p>Created at: <strong>{{$post->created_at}}</strong></p>
    <p>{{$post->content}}</p>
    <img class="old-img" src="{{asset('storage/covers/blog/'.$post->cover)}}" alt="your image" />
</div>
