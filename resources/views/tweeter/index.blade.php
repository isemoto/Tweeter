@extends('layouts.tweeter')

@section('title','Tweeter')

@section('menubar')
    menubarのTweeter
@endsection

@section('content')
    <button onclick="location.href='/tweeter/tweet'">ツイートする</button>
    <button onclick="location.href='/user/search'">ユーザー検索</button>
    <button onclick="location.href='/user/mypage'">マイページ</button>
    @isset($tweets)
        <table>
            @foreach($tweets as $tweet)
                <tr>
                    <td>{{$tweet->user->name}}</td>
                    <td><a href="/tweeter/reply_list?tweet_id={{$tweet->tweet_id}}">
                            {{$tweet->message}}
                        </a>
                    </td>
                    <td>
                      {{$tweet->created_at}}
                    </td>
                </tr>
            @endforeach
        </table>
    @endisset
@endsection

@section('footer')
    copyright 2020 group b.
@endsection
