@extends('layouts.app')

@section('title')
    <title>Chat free</title>
@show

@section('content')
    @if(Auth::check())
        <div class="container">
            <private-chat-component :room="{{ $room }}" :user="{{ Auth::user() }}"></private-chat-component>
        </div>
    @endif
@endsection
