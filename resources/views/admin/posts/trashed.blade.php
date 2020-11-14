
@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')

<div style="margin-bottom: 10px" class="row">
    <div class="col-lg-12">
        <strong>{{$subtitle}}</strong> <a href="{{route('admin.posts.create')}}" class="btn btn-success float-right">Add new posts</a>
        <a href="{{route('admin.posts.index')}}" class="btn btn-secondary float-right mr-1">Go back</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>posts List</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width=10></th>
                        <th>#</th>
                        <th>Title</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr data-entry-id="{{$post->id}}">
                            <td></td>
                            <td><strong>{{$post->id ?? ''}}</strong></td>
                            <td>{{$post->title ?? ''}}</td>
                            <th>{{$post->created_at ?? ''}}</th>
                            <td>
                                <a class="btn btn-xs btn-outline-primary" href="{{route('admin.posts.show', $post->id)}}">View</a>
                                <a class="btn btn-xs btn-outline-warning" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                                <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}" style="display:inline-block", onsubmit="return confirm('Are You Sure ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-xs btn-outline-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $posts->links() }}
    </div>
</div>

@endsection
