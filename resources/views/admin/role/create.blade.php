@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary"  ng-app="role" ng-controller ="roleController">
        <div class="panel-heading">
            
        </div>
        <div class="panel-body"> 
            <form action="{{route('admin.role.store')}}" method="POST" role="form">
                @csrf
                <div class="form-group">
                  <label for="">Name position:</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter name">
                </div>
                <div class="form-group" style="height: 300px; overflow-y:auto">
                    
                    <label for="">Route list:</label>
                    <input type="text" class="form-control" ng-model="rname" placeholder="Search route name">
               
                    
                    <div class="checkbox" ng-repeat="r in roles | filter:rname">
                        <label>
                            <input type="checkbox" class ="role-item" name="route[]" value="@{{r}}">
                            @{{r}}
                        </label>
                    </div>
                        
                </div>
                <label>
                    <input type="checkbox"  id="check-all"  > Select All
                </label>
                <button type="submit" class="btn btn-dark">Save</button>
                
              </form>
        </div>
    </div>
@stop()
@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js">
</script>
<script  type="text/javascript">
    var app = angular.module('role',[]);
    app.controller('roleController', function($scope){
        var roles = '<?php echo json_encode($routes); ?>';
        $scope.roles = angular.fromJson(roles);
        // console.log(angular.fromJson(roles));
    
    })
    $('#check-all').click(function(){
        $('.role-item').not(this).prop('checked', this.checked);
    })
</script>
@stop()