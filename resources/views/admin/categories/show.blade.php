@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Show Category
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
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            name
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            description
                        </th>
                        <td>
                            {{ $category->description}}
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
    <h1>{{$category->name}}</h1>
    <p>Created at: {{$category->created_at}}</p>
    <div>
        <p>{{$category->description}}</p>
    </div>
</div> --}}
