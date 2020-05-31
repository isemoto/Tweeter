@extends('layouts.tweeter')

@section('title','Tweeter')

@section('menubar')
    menubarのTweeter
@endsection

@section('content')
    <form action="/tweeter/tweet" method="post">
        @csrf
        <textarea name="message" rows="5" cols="100"></textarea>
        <br />
        <input type="submit" value="ツイートする">

    </form>
@endsection

@section('footer')
    copyright 2020 group b.
@endsection
