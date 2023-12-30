@extends('layouts.home')

@section('main')
<div class="container">
    <div class="row">
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
            <div class="col-md-6"> 
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <p>You have an account ? 
                    <a href="{{route('customer.login')}}"> Login</a> </p>
                
            </div>
        </form>
    </div>
</div>
@endsection
