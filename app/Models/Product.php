<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = true;
    //protected $dateFormat = 'h:m:s';
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','values','image','operating_system','description','brand_id'];

    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }
    public function colors()  {
        return $this->belongsToMany(Color::class);
    }

   
}
