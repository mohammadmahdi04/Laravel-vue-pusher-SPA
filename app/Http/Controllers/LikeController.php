<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Listeners\LikeEventListener;
use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeIt(Reply $reply)
    {
        $reply->like()->create([
//            'user_id' => auth()->id()
            'user_id' => '1'
        ]);
        broadcast(new LikeEvent($reply->id,1))->toOthers();
    }

    public function unLikeIt(Reply $reply)
    {
        $reply->like()->where(
//            'user_id' => auth()->id
            'user_id' ,1
        )->first()->delete();
        broadcast(new LikeEvent($reply->id,0))->toOthers();
    }
}
