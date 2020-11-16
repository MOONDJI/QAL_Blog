@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Edit tag
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tags.update", $tag->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($tag) ? $tag->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    tag Name required
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Update">
                <a class="btn btn-outline-secondary" href="{{ url()->previous() }}">
                    Back to list
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
{{-- <h2>Edit tag</h2>

<div>
    <form method="POST" action="{{route('admin.tags.update', $tag->id)}}">
        @method('PUT')
        @csrf
        <table>
            <tr>
                <th><label for="name">Name tag</label></th>
                <th><input type="text" name="name" value="{{$tag->name}}"></th>
            </tr>
            <tr>
                <th><label for="description">Description tag</label></th>
                <th><input type="text" name="description" value="{{$tag->description}}"><br></th>
            </tr>
            <tr>
                <th colspan="2"><button type="submit">Save</button></th>
            </tr>
        </table>
    </form>
</div> --}}
