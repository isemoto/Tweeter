@extends('layouts.tweeter')

@section('title','マイページ')
{{--user がじぶん--}}
{{--users他人　--}}
@section('content')


        <h2>{{$user->name}}のツイート </h2>


            @foreach($tweets as $tweet)
               <p>
                    <div>{{$tweet->message}}</div>
                </p>
            @endforeach


    <br>
    <a href="/login">ログアウト</a>
    <br>
        <br>
        <button onclick="location.href='/user/follow_list?type=follow' ">フォロー</button>
        <br>
        <br>
        <button onclick="location.href='/user/follow_list?type=follower'">フォロワー</button>
        <br>
@endsection

@section('footer')
    copyright 2020 groupB.
@endsection
