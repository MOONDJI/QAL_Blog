@extends('layout')

@section('title')Main Page @endsection

@section('main_content')

<div class="container">
    <h1>Posts</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <div class="card-body text-dark">
                <img width="100%" height="225" src="https://images-na.ssl-images-amazon.com/images/I/41cO5KT4M%2BL._AC_SY400_.jpg" alt="">
                <h3 class="card-text black-text">Theme for post #1</h3>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group mt-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">05.11.2020 15:03</small>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
