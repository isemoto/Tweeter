@extends('layouts.tweeter')

@section('title','マイページ')
{{--user がじぶん--}}
{{--users他人　--}}
@section('content')
    @if(isset($items))

        <h2>{{$thread->name}}</h2>

        <ol>
            @foreach($items as $item)
                <li>
                    <div>{{$item->getData()}}</div>
                </li>
            @endforeach
        </ol>
    @endif

    <form action="/keijiban/thre" method="post">
        @csrf
        <input type="text" name="msg">
        <input type="hidden" name="thread_id" value='{{$thread->id}}'>
        <input type="submit" value="投稿する">
    </form>
    <br>
    <a href="/keijiban">戻る</a>
    <br>
@endsection

@section('footer')
    copyright 2020 groupB.
@endsection
