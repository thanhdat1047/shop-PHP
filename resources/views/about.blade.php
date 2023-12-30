@extends('layouts.home')

@section('main')

    <h3>Brand id : {{$brand->id}}</h3>
    <h2>Brand name : {{$brand->name}}</h2>
   
    @foreach ($brand->products as $item)
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="thumbnail">
                <img src="{{asset('image/'.$item->image)}}" alt="">
                <div class = "caption">
                    <h3>{{$item->name}}</h3>
                </div>
                <p>
                    <a href="{{route('home.view',['id'=>$item->id,'slug'=>Str::slug($item->name)])}}" class="btn btn-primary">Show</a>
                    <a href="" class="btn btn-danger">Action</a>
                <p>
            </div>
        </div>
    @endforeach
@stop()