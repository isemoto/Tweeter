@extends('layouts.tweeter')

@section('title','Tweeter')

@section('menubar')
    <button onclick="location.href='/tweeter'">戻る</button>
@endsection

@section('content')
    @isset($tweets)
        <table>
            @foreach($tweets as $tweet)
                <tr>
                    @if($loop->first)
                        <th>{{$tweet->user->name}}</th>
                        <th>{{$tweet->message}}</th>
                        <th>{{$tweet->created_at}}</th>
                    @else
                        <td>{{$tweet->user->name}}</td>
                        <td>{{$tweet->message}}</td>
                        <td>{{$tweet->created_at}}</td>
                    @endif
                </tr>
            @endforeach
            <tr>
                <form action="/tweeter/reply" method="post">
                    @csrf
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        <input type="text" name="message" size="50">
                        <input type="hidden" name="tweet_id" value="{{$tweet_id}}">
                        <input type="submit" value="reply">
                    </td>
                    <td></td>

                </form>
            </tr>
        </table>
    @endisset
@endsection

@section('footer')
    copyright 2020 group b.
@endsection
