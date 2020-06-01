@extends('layouts.tweeter')

@section('title','Tweeter')

@section('menubar')
    <br/>
    <button onclick="location.href='/tweeter'">戻る</button>
@endsection

@section('content')
    <br/>
    <form action="/tweeter/tweet" method="post">
        @csrf
        @error('message')
        {{$message}}
        <br/>
        @enderror
        <input type="text" name="message"  placeholder="いまどうしてる？">
        <input type="submit" value="tweet">
    </form>
@endsection

@section('footer')
    copyright 2020 group b.
@endsection
