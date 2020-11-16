@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Show tag
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            id
                        </th>
                        <td>
                            {{ $tag->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            name
                        </th>
                        <td>
                            {{ $tag->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-outline-secondary" href="{{ url()->previous() }}">
                Back to list
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>

@endsection

{{-- <div>
    <h1>{{$tag->name}}</h1>
    <p>Created at: {{$tag->created_at}}</p>
    <div>
        <p>{{$tag->description}}</p>
    </div>
</div> --}}
