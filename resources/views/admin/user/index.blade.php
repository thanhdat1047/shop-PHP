@extends('layouts.admin')
@section('content')
<form action="" class="form-inline" style="padding: 8px">
    <div class="form-group">
        <input name= "key" class="form-control"  placeholder="Search">
    </div>
    <button type="submit" class="btn btn-primary"> 
        <i class="fas fa-search"></i>
    </button>
</form>
<div class="panel panel-dark">
    <div class="panel-heading">
        <i class="fas fa-table me-1"></i>
        DataTable Products
    </div>
    <div class="panel-body"> 
        <p><p>
    </div>
    <table  class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th class="text-right">Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td class ="text-right">
                        <a href="{{route('admin.user.show',$item->id)}}" class="btn btn-sm btn-warning" >Roles
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('admin.user.edit', $item->id)}}" class="btn btn-sm btn-success btnedit">Edit
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('admin.user.destroy', $item->id)}}" class="btn btn-sm btn-danger btndelete" >Delete
                            <i class="fas fa-trash"></i>
                        </a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        <div class="panel-footer">
            {{$users->appends(request()->all())->links()}}
        </div>
              
        <form method="POST" action="" id="form-delete">
            @csrf @method('DELETE')
        </form>
        <hr>
</div>
@stop()

@section('js')
<script>
  $('.btndelete').click(function(ev){
      ev.preventDefault();
      var _href = $(this).attr('href');
      $('form#form-delete').attr('action',_href);
      if(confirm('Are you sure you want to delete this?')){
          $('form#form-delete').submit();
      }
  })
</script>
@stop()