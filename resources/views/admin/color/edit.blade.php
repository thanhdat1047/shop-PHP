@extends('layouts.admin')

@section('content')
    <h1>Update Color</h1>
    <form action="{{route('color.update',$color->id)}}" method="POST" role="form">{{--multipart/form-data chia nho file upload--}}
        @csrf @method('PUT')
        <input type="hidden" value="{{$color->id}}"> 
        <input 
            class="form-control"
            type="text"
            name="name"
            value="{{$color->name}}"
            placeholder="Enter color's name">
        <input 
            class="form-control"
            type="text"
            name="encode"
            value="{{$color->encode}}"
            placeholder="Enter color's encode"  >
    
        <button class="btn btn-dark"
            type = "submit" >
            Submit </button>
    </form>
    @if($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p class='text-danger'> {{$error}}</p>
        @endforeach
    </div>
    @endif
@stop()
