@extends('layouts.tweeter')

{{--@section('title','マイページ')--}}
{{--user がじぶん--}}
{{--users他人　--}}
@section('content')

    @if (true)
    <h2>フォローリスト</h2>
    <table>
        @if (isset($users))
        @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>
                        <form action="delete_follow" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="submit" name="remove" value="フォロー解除">
                        </form>
                    </td>
                </tr>
        @endforeach
    </table>
        @endif
    <br>
    <a href="mypage">戻る</a>
    <br>
    @else

        <h2>フォロワーリスト</h2>
                @if (isset($users))
                    <table>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        @if ($user->followed_id==\Illuminate\Support\Facades\Auth::id())
                            <td>
                                <form action="delete_follow" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <input type="submit" name="remove" value="フォロー解除">
                                </form>
                            </td>
                        @else
                            <td>
                                <form action="create_follow" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <input type="submit" name="add" value="フォローする">
                                </form>
                            </td>
                        @endif


                    </tr>
                    @endforeach
                    </table>
                @endif
        <br>
        <a href="mypage">戻る</a>
        <br>
    @endif



@endsection

@section('footer')
    copyright 2020 groupB.
@endsection
