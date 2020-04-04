<?php

namespace App;

use App\User;
use App\Reply;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected static function boot(){
        parent::boot();
        static::creating(function ($question){
            $question->slug = ($question->title);
         });
    }


    protected $fillable =['slug','title','body','user_id','category_id'];
    protected $with=['replies'];
    public function getRouteKeyName(){
        return 'slug';
    }

    public function getPathAttribute(){
        return "/question/$this->slug" ;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
{
    return $this->belongsTo(Category::class);
}

public function replies()
{
    return $this->hasMany(Reply::class)->latest();
}





    //
}
