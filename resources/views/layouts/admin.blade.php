<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" contents="{{ csrf_token() }}">

    <title>Admin - @yield('title')</title>

    @include('layouts.partials.admin._styles')
    @yield('styles')

  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    @include('layouts.partials.admin._nav')

    <div class="app-body">
        @include('layouts.partials.admin._sidebar')
        <main class="main">

            <div style="padding-top: 20px" class="container-fluid">
                @if(session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')

            </div>


        </main>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    @include('layouts.partials.admin._scripts')
    @yield('scripts')

  </body>
</html>
