@extends('layouts.tweeter')

{{--@section('title','マイページ')--}}
{{--user がじぶん--}}
{{--users他人　--}}
@section('content')

{{--    @if ($is_follow)--}}
{{--    <h2>フォローリスト</h2>--}}

{{--    <ul>--}}
{{--        @foreach($users as $tweet)--}}
{{--            <li>--}}
{{--                <div>{{$tweet->message}}</div>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}

{{--    <br>--}}
{{--    <a href="/login">ログアウト</a>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <a href="user/user_search">フォロー</a>--}}
{{--    <br>--}}
{{--    <br>--}}
{{--    <a href="user/user_search">フォロワー</a>--}}
{{--    <br>--}}
{{--    @else--}}
{{--    @endif--}}
<h2>フォローリスト</h2>
<ul>
            @foreach($follows as $follow)
                <li>
                    <div>{{$follow}}</div>
                </li>
            @endforeach
        </ul>


@endsection

@section('footer')
    copyright 2020 groupB.
@endsection
