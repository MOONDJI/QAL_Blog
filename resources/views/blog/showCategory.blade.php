<h1>{{$title}}</h1>
<div>
    <div>
        <h2>{{$category->name}}</h2>
        <p>Created at: <strong>{{$category->created_at}}</strong></p>
    </div>
    <div>
        {{$category->description}}
    </div>
</div>
