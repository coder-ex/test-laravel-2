<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function outMessage(Request $request) {
        \App\Events\Message::dispatch($request->input('body'));
    }
}
