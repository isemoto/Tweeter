@extends('layouts.tweeter')

@section('title','Tweeter')

@section('menubar')
    <br/>
    <button onclick="location.href='/tweeter'">戻る</button>
@endsection
@section('content')
    <form action="search" method="post">
        <label>ユーザー名</label>
        @csrf
        <input type="text" name="input" value="{{$input ?? ''}}">
        <input type="submit" value="検索">
    </form>

    @if(isset($items))
        <table>
            @foreach($items as $item)
                @if(Auth::id() != $item->id)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>
                            @if($item->is_follow)
                                <form action="delete" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="submit" name="remove" value="フォロー解除">
                                </form>
                            @else
                                <form action="create" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="submit" name="add" value="フォローする">
                                </form>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    @endif
@endsection

@section('footer')
    copyright 2020 group b.
@endsection
