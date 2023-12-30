@extends('layouts.admin')
@section('content')
    <h1>Update Product</h1>
    <form action="{{route('product.update',$product->id)}}" method="POST" role="form"enctype="multipart/form-data">{{--multipart/form-data chia nho file upload--}}
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text"
                        name="name"placeholder="Enter product's name" value="{{$product->name}}">
                </div>
                
                <div class="form-group">
                    <label for="">Image:</label>
                    <input class="form-control" type="file" name="image" >
                </div>
                <div class="form-group">
                    <label for="">Description:</label>
                    <textarea name="description" class="form-control"placeholder="Enter product's description" rows="5">{{$product->description}}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                
                <div class="form-group">
                    <label for="">Values:</label>
                    <input  class="form-control" type="text"
                    name="values"placeholder="Enter product's values" 
                    value="{{$product->values}}">
                </div>
                <div class="form-group">
                    <label for="">Operating_system:</label>
                    <input  class="form-control" type="text"
                    name="operating_system"placeholder="Enter product's operating system" value="{{$product->operating_system}}" >
                </div>
                <div class="form-group">
                    <label for="sel1">Select Color:</label>
                    <select class="form-control" id="sel1" name="color_id[]" multiple>
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">
                                {{$color->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="sel2">Select Brand:</label>
                    <select class="form-control" id="sel2" name="brand_id">
                        <option value="{{$product->brand->id}}">    {{$product->brand->name}}
                        </option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">
                                {{$brand->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                
            </div>
        </div>
    
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