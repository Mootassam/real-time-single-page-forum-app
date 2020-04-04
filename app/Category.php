<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected static function boot(){
        parent::boot();
        static::creating(function($category){
            $category->slug = $category->name ;
        }) ;
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public $fillable=['slug','name'];
    //
}
