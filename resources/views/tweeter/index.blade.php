@extends('layouts.tweeter')

@section('title','tweeter')

@section('menubar')
    menubarのtweeter
@endsection

@section('content')
    <button onclick="location.href='/tweeter/tweet'">ツイートする</button>
    {{--    <p>{{$user}}</p>--}}
    {{--    <p>{{$follows}}</p>--}}

    {{--    <p>{{$tweets}}</p>--}}

    @isset($tweets)
        <table>
            @foreach($tweets as $tweet)
                <tr>
                    <td>{{$tweet->user_id}}</td>
                    <td><a href="/tweeter/reply_list?tweet_id={{$tweet->tweet_id}}">
                            {{--                        @foreach($users as $user)--}}
                            {{--                            @if($tweet->user_id == $user->id)--}}
                            {{--                                {{$user->name}}:{{$tweet->message}}--}}
                            {{--                            @endif--}}
                            {{--                        @endforeach--}}

                            {{$tweet->message}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endisset
@endsection

@section('footer')
    copyright 2020 group b.
@endsection
