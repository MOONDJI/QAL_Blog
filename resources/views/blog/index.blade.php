<h1>{{$title}}</h1>

<div>
    @foreach($posts as $post)
    <div>
        {{-- {{$post->user}} --}}
        <div>
            <h2> <a href="{{route('blog.post', $post->id)}}">{{$post->title}}</a></h2>
            <p>Created at: <strong>{{$post->created_at}}</strong> in category: <strong><a href="{{route('blog.posts.category', $post->category->id)}}">{{$post->category->name}}</a></strong> by <strong>{{$post->user->name ?? ''}}</strong></p>
            <p>Authoor: <a href="{{route('blog.posts.user', $post->user->id ?? '')}}"><strong>{{$post->user->profile->full_name ?? ''}}</strong></a></p>
        </div>
        <div>
            {{$post->content}}
        </div>
    </div>
    @endforeach
</div>

{{-- <div>
    <h1>Categories</h1>
    @foreach($categories as $category)
    <div>
        <h2><a href="{{route('blog.category', $category->id)}}">{{$category->name}}</a></h2>
        <p><strong>{{$category->created_at}}</strong></p>
        <p>{{$category->description}}</p>
    </div>
    @endforeach
</div> --}}
