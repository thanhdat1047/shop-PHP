@extends('layouts.home')

@section('main')
<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <form action="" method="POST" role="form">
            <legend>Login </legend>
            @csrf
            @if($errors->all())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                           <p> <strong>Danger!</strong> {{$error}}</p>
                        @endforeach
                    </div>
            @endif
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" value="1">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me.
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p>You don't have account ? 
                <a href="{{route('customer.register')}}"> Register new account</a></p>
        </form>
    </div>
</div>
@endsection
