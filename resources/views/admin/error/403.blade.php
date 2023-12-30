@extends('layouts.admin')
@section('content')
<?php 
    $code = isset($code) ? $code : 404;
    $title = isset($title) ? $title : 'Not found';
    $message = isset($message) ? $message :'We could not find the page you were looking for.' ;
?>
    <div class="error-page">
        <h2 class="headline text-warning"> {{$code}}</h2>
    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> {{$title}}</h3>
        <p>
        {{$message}}... 
        Meanwhile, you may <a href="{{route('admin.index')}}">return to dashboard</a>
        </p>
    {{-- <form class="search-form">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search" data-listener-added_8ecb7f35="true">
            <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    
    </form> --}}
    </div>
    
    </div>
    
@stop()