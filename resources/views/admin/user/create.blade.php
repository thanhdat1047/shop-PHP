@extends('layouts.admin')
@section('content')
    <div class="panel panel-dark">
        <div class="panel-heading">
            Role list
        </div>
        <div class="panel-body"> 
            <form action="{{route('admin.user.store')}}" method="POST" role="form">
                @csrf 
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" >Name</label>
                            <input type="text" class="form-control"  name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="" >Email</label>
                            <input type="text" class="form-control" name="email"placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="" >Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="" >Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password"placeholder="Confirm password">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" >Role</label> 
                            @foreach($roles as $role)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name ="role[]" value="{{$role->id}}"> {{$role->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-dark">Submit</button>
              </form>
        </div>
    </div>
@endsection