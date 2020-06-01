@extends('layouts.tweeter')

@section('title','マイページ')
@section('menubar')

@endsection

{{--users他人　--}}
@section('content')

    @if ($type == 'follow')
        <h2>フォローリスト</h2>
    @else
        <h2>フォロワーリスト</h2>
    @endif
    <table>
        @if (isset($users))
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        @if ($user->is_follow)
                            <form action="/user/follow_list/delete" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="hidden" name="type" value={{$type}}>

                                <input type="submit" name="remove" value="フォロー解除">

                            </form>
                        @else
                            <form action="/user/follow_list/create" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <input type="hidden" name="type" value={{$type}}>
                                <input type="submit" name="add" value="フォローする">
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
    </table>
    @endif
    <br>
    <button onclick="location.href='/user/mypage' ">戻る</button>
    <br>
    {{--    @else--}}

    {{--        <h2>フォロワーリスト</h2>--}}
    {{--        @if (isset($users))--}}
    {{--            <table>--}}
    {{--                @foreach($users as $user)--}}
    {{--                    <tr>--}}
    {{--                        <td>{{$user->name}}</td>--}}
    {{--                        @if ($user->followed_id==\Illuminate\Support\Facades\Auth::id())--}}
    {{--                            <td>--}}
    {{--                                <form action="delete_follow" method="post">--}}
    {{--                                    @csrf--}}
    {{--                                    <input type="hidden" name="id" value="{{$user->id}}">--}}
    {{--                                    <input type="submit" name="remove" value="フォロー解除">--}}
    {{--                                </form>--}}
    {{--                            </td>--}}
    {{--                        @else--}}
    {{--                            <td>--}}
    {{--                                <form action="create_follow" method="post">--}}
    {{--                                    @csrf--}}
    {{--                                    <input type="hidden" name="id" value="{{$user->id}}">--}}
    {{--                                    <input type="submit" name="add" value="フォローする">--}}
    {{--                                </form>--}}
    {{--                            </td>--}}
    {{--                        @endif--}}


    </tr>
    {{--                @endforeach--}}
    </table>




@endsection

@section('footer')
    copyright 2020 groupB.
@endsection
