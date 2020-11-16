@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')

<div style="margin-bottom: 10px" class="row">
    <div class="col-lg-12">
        <strong>{{$subtitle}}</strong> <a href="{{route('admin.tags.create')}}" class="btn btn-success float-right">Add new tags</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>tags List</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th width=10></th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr data-entry-id="{{$tag->id}}">
                            <td></td>
                            <td><strong>{{$tag->id ?? ''}}</strong></td>
                            <td>{{$tag->name ?? ''}}</td>
                            <th>{{$tag->created_at ?? ''}}</th>
                            <td>
                                <a class="btn btn-xs btn-outline-primary" href="{{route('admin.tags.show', $tag->id)}}">View</a>
                                <a class="btn btn-xs btn-outline-warning" href="{{route('admin.tags.edit', $tag->id)}}">Edit</a>
                                <form method="POST" action="{{route('admin.tags.destroy', $tag->id)}}" style="display:inline-block", onsubmit="return confirm('Are You Sure ?')">
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
        {{$tags->links()}}
    </div>
</div>

{{-- <div>
    <h1>tags</h1>

    <h2><a href="{{route('admin.tags.create')}}">New tag</a></h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th><a href="{{route('admin.tags.show', $tag->id)}}">{{$tag->name}}</a></th>
                    <th><a href="{{route('admin.tags.edit', $tag->id)}}">Edit</a></th>
                    <th>
                        <form method="POST" action="{{route('admin.tags.destroy', $tag->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

@endsection
