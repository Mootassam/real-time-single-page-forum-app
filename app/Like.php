<?php

namespace App;

use App\Reply;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    public function reply()
    {
        return $this->hasMany(Reply::class);
    }

    protected $guarded=[''];
    //
}
