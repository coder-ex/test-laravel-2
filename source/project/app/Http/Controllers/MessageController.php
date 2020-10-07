<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function outMessage(Request $request) {
        \App\Events\PrivateMessage::dispatch($request->all());
    }

    public function getRoom(\App\Room $room) {
        return view('room', ['room' => $room]);
    }
}
