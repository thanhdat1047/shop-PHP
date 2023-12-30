@extends('layouts.admin')
@section('content')
    <div class="panel panel-dark">
        <div class="panel-heading">
            Role list
        </div>
        <div class="panel-body"> 
            <p><p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $model)
                    <tr>
                        <td>{{$model->id}}</td>
                        <td>{{$model->name}}</td>
                        <td>
                            <a href="{{route('admin.role.edit',$model->id)}}" class="btn btn-xs btn-primary">Edit</a>
                            <a href="" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="panel-footer">
            {{$data->links()}}
        </div>
    </div>
@endsection