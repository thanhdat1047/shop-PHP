@extends('layouts.home')
@section('css')
    <link rel="apple-touch-icon" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">

@stop()
@section('main')
<div class="panel panel-dark">
    <div class="panel-heading">
        <i class="fas fa-table me-1"></i>
        Brands
    </div>
    <div class="panel-body"> 
        <form action="" method="GET" class="form-inline" role="form">
            <div class="form-group">
                <input name= "key" class="form-control"  placeholder="Search">
                <button type="submit" class="btn btn-primary"> 
                    <i class="fas fa-search"></i>
                </button>
            </div>
           
        </form>
    </div>
    <table  class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th class="text-right">Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td class ="text-right">
                        <a href="{{route('brand.product_by_brand',$item->id)}}" class="btn btn-sm btn-warning" >Products
                            <i class="fas fa-eye"></i>
                        </a>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
        <div class="panel-footer">
            {{$brands->appends(request()->all())->links()}}
        </div>
              
        <form method="POST" action="" id="form-delete">
            @csrf @method('DELETE')
        </form>
        <hr>
</div>
@stop()

@section('js')
<script src="{{asset('assets/js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/templatemo.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
@stop()