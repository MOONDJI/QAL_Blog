@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')

<div style="margin-bottom: 10px" class="row">
    <div class="col-lg-12">
        <strong>{{$subtitle}}</strong> <a href="{{route('admin.categories.create')}}" class="btn btn-success float-right">Add new categories</a>
        <a href="{{route('admin.categories.trashed')}}" class="btn btn-danger float-right mr-1">Trashed categories</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Categories List</h2>
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
                    @foreach($categories as $category)
                        <tr data-entry-id="{{$category->id}}">
                            <td></td>
                            <td><strong>{{$category->id ?? ''}}</strong></td>
                            <td>{{$category->name ?? ''}}</td>
                            <th>{{$category->created_at ?? ''}}</th>
                            <td>
                                <a class="btn btn-xs btn-outline-primary" href="{{route('admin.categories.show', $category->id)}}">View</a>
                                <a class="btn btn-xs btn-outline-warning" href="{{route('admin.categories.edit', $category->id)}}">Edit</a>
                                <form method="POST" action="{{route('admin.categories.destroy', $category->id)}}" style="display:inline-block", onsubmit="return confirm('Are You Sure ?')">
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
        {{$categories->links()}}
    </div>
</div>

{{-- <div>
    <h1>Categories</h1>

    <h2><a href="{{route('admin.categories.create')}}">New category</a></h2>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th><a href="{{route('admin.categories.show', $category->id)}}">{{$category->name}}</a></th>
                    <th><a href="{{route('admin.categories.edit', $category->id)}}">Edit</a></th>
                    <th>
                        <form method="POST" action="{{route('admin.categories.destroy', $category->id)}}">
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
