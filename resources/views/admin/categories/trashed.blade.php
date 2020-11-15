@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')

<div style="margin-bottom: 10px" class="row">
    <div class="col-lg-12">
        <strong>{{$subtitle}}</strong> <a href="{{route('admin.categories.index')}}" class="btn btn-secondary float-right">Go back</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Categories Trashed List</h2>
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
                            <th>{{$category->deleted_at ?? ''}}</th>
                            <td>
                                <form method="POST" action="{{route('admin.categories.restore', $category->id)}}" style="display:inline-block">
                                    @csrf
                                    <button class="btn btn-xs btn-outline-primary" type="submit">Restore</button>
                                </form>
                                <form method="POST" action="{{route('admin.categories.force', $category->id)}}" style="display:inline-block">
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

@endsection
