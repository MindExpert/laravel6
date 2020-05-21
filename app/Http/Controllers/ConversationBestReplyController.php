<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        //authorize that current user has premission to set the best reply for conv
            // if (Gate::denies('update-conversation', $reply->conversation)) {
            //     # code...
            //     dd('Do it this way insteamaybe or...')
            // }
        $this->authorize('update', $reply->conversation);

        //then set it
            // $reply->conversation->best_reply_id = $reply->id;
            // $reply->conversation->save();
        $reply->conversation->setBestReply($reply);

        //redirect to the conv page
        return back();
    }
}
