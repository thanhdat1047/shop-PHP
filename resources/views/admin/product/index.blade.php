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
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Products
    </div>
    <div class="card-body" >
        <table id="datatablesSimple"style="width: 80%; padding: 8px;
        text-align: center;">
            <thead>
              <tr>
                <th style="border: 1px solid black;">Id</th>
                <th style="border: 1px solid black;">Name</th>
                <th style="border: 1px solid black;">Values</th>
                <th style="border: 1px solid black;" >Description</th>
                <th style="border: 1px solid black; width: 150px;">Operating_system</th>
                {{-- <th style="border: 1px solid black;">Image</th> --}}
                <th style="border: 1px solid black;">Brand</th>
                <th style="border: 1px solid black;">color</th>
                <th style="border: 1px solid black;" class="text-right">Actions</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($products as $item)
              <tr>
                <td style="border: 1px solid black;">{{$item->id}}</td>
                <td style="border: 1px solid black;">{{$item->name}}</td>
                <td style="border: 1px solid black;">{{$item->values}}</td>
                <td style="border: 1px solid black;width: 150px;">{{$item->description}}</td>
                <td style="border: 1px solid black;">{{$item->operating_system}}</td>
                {{-- <td style="border: 1px solid black;">{{$item->image}}</td> --}}
                <td style="border: 1px solid black;">{{$item->brand->name}}</td>
                <td style="border: 1px solid black;">
                    @foreach ($item->colors as $color)
                        <div style="width:20px;height:20px;background-color:{{$color->encode}};border-radius:50%;border: 1px solid black;"></div>
                    @endforeach
                </td>
                <td style="border: 1px solid black;" class ="text-right">
                        <a href="{{route('admin.product.show',$item->id)}}" class="btn btn-sm btn-info " >
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('admin.product.edit', $item->id)}}" class="btn btn-sm btn-success btnedit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('admin.product.destroy',$item->id)}}" class="btn btn-sm btn-danger btndelete" >
                            <i class="fas fa-trash"></i>
                        </a>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
              
        <form method="POST" action="" id="form-delete">
            @csrf @method('DELETE')
        </form>
        <hr>
        <div>
            {{$products->appends(request()->all())->links()}}
        </div>
          
    </div>
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