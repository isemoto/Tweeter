@extends('layouts.tweeter')

@section('title','tweeter')

@section('menubar')
    ユーザー検索
@endsection
@section('content')
    <button onclick="location.href='/tweeter'">戻る</button>
    <form action="search" method="post">
        <label>ユーザー名</label>
        @csrf
        <input type="text" name="input" value="{{$input ?? ''}}">
        <input type="submit" value="検索">
    </form>

    @if(isset($follows))
        {{$follows}}
    @endif

    @if(isset($items))
        <table>
            @foreach($items as $item)
                @if(Auth::id() != $item->id)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>
{{--                        あってるかわからないので残しておく--}}
{{--                        @if(isset($follows->followed_user_id))--}}
{{--                            @foreach($follows as $follow)--}}
{{--                            @if(!array_search($item->id,array_column($follows,'followed_user_id')))--}}
{{--                                <form action="create" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="id" value="{{$item->id}}">--}}
{{--                                    <input type="submit" name="add" value="フォローする">--}}
{{--                                </form>--}}
{{--                            @else--}}
{{--                                <form action="delete" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="id" value="{{$item->id}}">--}}
{{--                                    <input type="submit" name="remove" value="フォロー解除">--}}
{{--                                </form>--}}
{{--                            @endif--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <form action="create" method="post">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="id" value="{{$item->id}}">--}}
{{--                                <input type="submit" name="remove" value="フォローsuru">--}}
{{--                            </form>--}}
{{--                        @endif--}}
                        @php
                            $check = 0;
                        @endphp
                        @if(isset($follows))
                            @foreach($follows as $follow)
                                @if($item->id == $follow->followed_user_id)
                                    @php
                                    $check++
                                    @endphp
                                @endif
                            @endforeach
                        @endif
                        @if($check)
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
