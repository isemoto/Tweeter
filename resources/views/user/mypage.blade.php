@extends('layouts.tweeter')


@section('title','Mypage')
@section('menubar')
    <br/>
    {{$user->name}}
    <br/>
    <button onclick="location.href='/tweeter' ">戻る</button>
    <button onclick="location.href='/user/follow_list?type=follow' ">フォロー</button>
    <button onclick="location.href='/user/follow_list?type=follower'">フォロワー</button>
@endsection


@section('content')
    @isset($tweets)
        <table>
            @foreach($tweets as $tweet)
                <tr>
                    <td>{{$tweet->message}}</td>
                    <td>
                        <form action="/user/mypage/delete" method="post">
                            @csrf
                            <input type="hidden" name="tweet_id" value="{{$tweet->tweet_id}}">
                            <input type="submit" name="remove" value="ツイート削除">
                        </form>
                    </td>
                    <td>{{$tweet->created_at}}</td>
                </tr>
            @endforeach
        </table>
    @endisset
@endsection

@section('footer')
    copyright 2020 group b.
@endsection
