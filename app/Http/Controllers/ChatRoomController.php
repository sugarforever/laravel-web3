<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Events\MessagePushed;

class ChatRoomController extends Controller
{
    public function show()
    {
        return Inertia::render('ChatRoom');
    }

    public function sendMessage(Request $request, $channel_id)
    {
        $message = $request->input('message');
        $user_name = auth()->user()->name;
        broadcast(new MessagePushed($channel_id, $message, $user_name));

        return [
            "status" => 'ok'
        ];
    }
}
