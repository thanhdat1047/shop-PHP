@extends('layouts.home')

@section('main')
<div class="container">
  
    <form class="form-inline" method="POST" action="{{route('home.upload')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="sr-only" for="email"> File :</label>
          <input type="file" class="form-control" name="upload">
        </div>
        <button type="submit" class="btn btn-default">Upload</button>
    </form>
</div>
@endsection
