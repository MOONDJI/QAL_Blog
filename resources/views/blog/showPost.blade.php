<h1>{{$title}}</h1>
<div>
    <div>
        <h2>{{$post->title}}</h2>
        <p>Created at: <strong>{{$post->created_at}}</strong> in category: <strong>{{$post->category->name ?? '...'}}</strong> by <strong>{{$post->user->name ?? '...'}}</strong></p>
        <p>Autor: <strong>{{$post->user->profile->full_name ?? '...'}}</strong></p>
    </div>
    <div>
        <p> Tags:
            @foreach ($post->tags as $tag)
                <strong>{{$tag->name}}</strong>
            @endforeach
        </p>
    </div>
    <div>
        {{$post->content}}
    </div>
    <div>
        <img src="{{asset('storage/covers/blog/'.$post->cover)}}" alt="">
    </div>
    <div>
        <a href="{{route('blog.main')}}"><button>Go back</button></a>
    </div>
</div>
