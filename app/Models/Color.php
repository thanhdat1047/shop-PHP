<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors'; 
    protected $primaryKey = 'id'; 
    public $timestamps = true;

    protected $fillable = ['name', 'encode','product_id'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
    //them localScope 
    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
    
    //GlobalScope
}
