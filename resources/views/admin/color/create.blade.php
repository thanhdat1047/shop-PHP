@extends('layouts.admin')
@section('content')
    <h1>Create Color</h1>
    <form action="{{route('color.store')}}" method="POST" role="form">{{--multipart/form-data chia nho file upload--}}
        @csrf
        <input 
            class="form-control"
            type="text"
            name="name"
            placeholder="Enter color's name">
        <input 
            class="form-control"
            type="text"
            name="encode"
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
@endsection