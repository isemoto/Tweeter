@extends('layouts.tweeter')

@section('title','tweeter')

@section('menubar')
    menubarのtweeter
@endsection

@section('content')
    <button onclick="location.href='/tweeter/tweet'">ツイートする</button>
    @isset($tweets)
        <table>
            @foreach($tweets as $tweet)
                <tr>
                    <td>{{$tweet->user->name}}</td>
                    <td><a href="/tweeter/reply_list?tweet_id={{$tweet->tweet_id}}">
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
