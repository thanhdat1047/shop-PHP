@extends('layouts.admin')
@section('content')
    <div class="panel panel-dark">
        <div class="panel-heading">
            
        </div>
        <div class="panel-body"> 
            <form action="{{route('admin.user.update',$user->id)}}" method="POST" role="form">
                @csrf @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" >Name</label>
                            <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="Enter name">
                            @error('name')
                                <p>{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" >Email</label>
                            <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Enter name">
                            @error('email')
                                <p>{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" >Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                            @error('password')
                                <p>{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" >Confirm Password</label>
                            <input type="password" class="form-control" name="confrim_password" placeholder="Confirm password">
                            @error('confrim_password')
                                <p>{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" >Role</label> 
                            @foreach($roles as $role)
                            <?php $checked = in_array($role->name, $role_assignments) ? 'checked' : ''; ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" {{$checked}} name ="role[]" value="{{$role->id}}"> {{$role->name}}
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