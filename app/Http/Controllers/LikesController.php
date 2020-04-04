<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use App\Events\LikeEvent;
use Illuminate\Http\Request;

class LikesController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT');
    }

  public function LikeIt(Reply $reply){
        $reply->Like()->create([
            'user_id' => auth()->id()

        ]);

        broadcast(new LikeEvent($reply->id,1))->toOthers();



  }
  public function unLikeIt(Reply $reply){
      $reply->like()->where('user_id',auth()->id())->first()->delete();
      broadcast(new LikeEvent($reply->id,0))->toOthers();


  }

}
