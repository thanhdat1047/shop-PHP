<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    @yield('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Action
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::guard('cus')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('customer.profile')}}">Hi {{Auth::guard('cus')->user()->name}}</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('customer.logout')}}">Logout</a>
                    </li>
                    @else 
                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('customer.login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{route('customer.register')}}">Register</a>
                    </li>
                    @endif
                </ul>
              </div>
            </div>
          </nav>

        <main class="py-4">
            @if(Session::has('error'))
            <div class="alert alert-danger">
                <strong>Danger!</strong> {{Session::get('error')}}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">
                <strong>Success!</strong>  {{Session::get('success')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Brand</h3>
                    </div>
                    <div class="list-group">
                        @foreach ($brands as $item)
                            <a href="{{route('home.view',['id'=>$item->id,'slug'=>Str::slug($item->name)])}}" class="list-group-item">{{$item->name}}</a>
                        @endforeach
                    </div>
                </div>
                
            </div>
            <div class="col-md-9">
                @yield('main')
            </div>
        </main>

    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
    </div>
</body>
</html>
