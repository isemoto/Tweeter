@extends('layouts.tweeter')

@section('title','Tweeter')

@section('menubar')
    <button onclick="location.href='/tweeter'">戻る</button>
@endsection

@section('content')
    <br/>
    <form action="/tweeter/tweet" method="post">
        @csrf
        <input type="text" name="message" size="100">
        <input type="submit" value="tweet">

    </form>
@endsection

@section('footer')
    copyright 2020 group b.
@endsection
