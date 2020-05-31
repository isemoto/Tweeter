@extends('layouts.tweeter')

@section('title','マイページ')
{{--user がじぶん--}}
{{--users他人　--}}
@section('content')


        <h2>自分のツイート</h2>

        <ul>
            @foreach($tweets as $tweet)
                <li>
                    <div>{{$tweet->message}}</div>
                </li>
            @endforeach
        </ul>

    <br>
    <a href="/login">ログアウト</a>
    <br>
        <br>
        <a href="follow_list">フォロー</a>
        <br>
        <br>
        <a href="follow_list">フォロワー</a>
        <br>
@endsection

@section('footer')
    copyright 2020 groupB.
@endsection
