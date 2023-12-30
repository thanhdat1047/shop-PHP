@extends('layouts.admin')
@section('content')
    <div class="panel panel-primary"  ng-app="role" ng-controller ="roleController">
        <div class="panel-heading">
            
        </div>
        <div class="panel-body"> 
            <form action="{{route('admin.role.update',$model->id  )}}" method="POST" role="form">
                @csrf @method('PUT')
                <div class="form-group">
                  <label for="">Name position:</label>
                  <input type="text" class="form-control" value="{{$model->name}}" name="name" placeholder="Enter name">
                </div>
                <div class="form-group" style="height: 300px; overflow-y:auto">
                    
                    <label for="">Route list:</label>
                    <input type="text" class="form-control" ng-model="rname" placeholder="Search route name">
               
                    
                    <div class="checkbox" ng-model="role" ng-repeat="r in roles | filter:rname">
                        <label>
                            <input type="checkbox" ng-checked="set_checked(r)" class ="role-item" name="route[]" value="@{{r}}">
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
        var permissions = '<?php echo json_encode($permissions); ?>';
        $scope.roles = angular.fromJson(roles);
        $scope.role = angular.fromJson(permissions);
        // console.log(angular.fromJson(roles));

        $scope.set_checked =function(r){
            for (var i = 0; i < $scope.role.length; i++) {
                if($scope.role[i] == r){
                    return true;
                }
            }
            return false;
        }

    
    
    })
    $('#check-all').click(function(){
        $('.role-item').not(this).prop('checked', this.checked);
    })
</script>
@stop()