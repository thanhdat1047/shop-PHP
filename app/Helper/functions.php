<?php 

    if(!function_exists('demo')){
        function demo(){
            echo 'Day la ham demo ';
            
        }   
    }
    /***
     * This is demo function , parameter is name of input file , return name is image was done
     * 
     */
    if(!function_exists('upload_image')){
        function upload_image($field_name){
            request()->validate([
                $field_name => 'required|mimes:jpeg,png,gif'
            ]);
            $info = pathinfo(request()->$field_name->getClientOriginalName());
    
            $file_name = $info['filename'];
            $file_ex = $info['extension'];
            $full_name = time().'-'.Str::slug($file_name).'.'.$file_ex;
    
            request()->$field_name->move(public_path('uploads'),$full_name);
    
            return $full_name;
        }
    } 
   
?>