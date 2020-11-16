@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Create Post
    </div>

    <div class="card-body">
        <form action="{{ route("admin.posts.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Title*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($post) ? $post->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    post title required
                </p>
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">Content</label>
                <textarea type="text" id="content" name="content" class="form-control" value="{{ old('content', isset($post) ? $post->content : '') }}">
                </textarea>
                    @if($errors->has('content'))
                    <em class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </em>
                @endif
                <p class="helper-block">
                    Content
                </p>
            </div>
            <div class="form-group">
                <label for="content">Category</label>
                <select id="category_id" name="category_id" class="form-control select2">
                    @foreach($categories as $id => $post)
                        <option value="{{$id}}">{{$post}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="content">Tags</label>
                <select id="tags" name="tags[]" class="form-control select2" multiple>
                    @foreach($tags as $id => $tag)
                        <option value="{{$id}}">{{$tag}}</option>
                    @endforeach
                </select>
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
