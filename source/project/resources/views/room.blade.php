@extends('layouts.app')

@section('title')
    <title>Chat free</title>
@show

@section('content')
    <div class="container">
        <private-chat-component :room="{{ $room  }}"></private-chat-component>
    </div>
@endsection
