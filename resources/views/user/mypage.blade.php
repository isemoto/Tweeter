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
        @php
            $is_follow=true;
        @endphp
        <a href="follow_list">フォロー

        </a>
{{--        <form method="POST" action="follow_list">--}}
{{--            @csrf--}}
{{--            @php--}}
{{--            $count=0;--}}
{{--            @endphp--}}
{{--            <input type="hidden" name="is_follow" value="{{$count}}">--}}
{{--            <input type="submit" value="フォローリスト">--}}

        <br>
        <br>
{{--            @php--}}
{{--                $count+=1;--}}
{{--            @endphp--}}
{{--            <input type="hidden" name="is_follow" value="{{$count}}">--}}
{{--            <input type="submit" value="フォロワーリスト">--}}
        </form>
        <a href="follow_list">フォロワー
            @php
                $is_follow=false;
            @endphp
        </a>
        <br>
@endsection

@section('footer')
    copyright 2020 groupB.
@endsection
