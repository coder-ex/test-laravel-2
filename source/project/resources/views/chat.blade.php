@extends('layouts.app')

@section('title')
    <title>Chat free</title>
@show

@section('content')
    <div class="container">
{{--        <chat-component></chat-component>--}}
        <private-chat-component></private-chat-component>
    </div>
@endsection
