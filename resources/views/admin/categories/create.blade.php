@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Create Category
    </div>

    <div class="card-body">
        <form action="{{ route("admin.categories.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($category) ? $category->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    Category Name required
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', isset($category) ? $category->description : '') }}">
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    Categories Description
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="save">
                <a class="btn btn-outline-secondary" href="{{ url()->previous() }}">
                    Back to list
                </a>
            </div>
        </form>


    </div>
</div>
@endsection

{{-- <h2>Create Category</h2>

<div>
    <form action="{{route('admin.categories.store')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th><label for="name">Name category</label></th>
                <th><input type="text" name="name"></th>
            </tr>
            <tr>
                <th><label for="description">Description category</label></th>
                <th><input type="text" name="description" ><br></th>
            </tr>
            <tr>
                <th colspan="2"><button type="submit">Save</button></th>
            </tr>
        </table>
    </form>
</div> --}}
