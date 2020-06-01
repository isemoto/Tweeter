@extends('layouts.tweeter')
<style>
    .pagination { font-size:10pt;}
    .pagination li { display:inline-block}
</style>


@section('title','ユーザ認証')

@section('menubar')
    @parent
    インデックスページ
@endsection


@section('footer')
    copyright 2020 tuyano.
@endsection

@section('content')
    <p>{{$message}}</p>
    <form action="/tweeter/auth" method="post">
        <table>
            @csrf
            <tr><th>mail: </th><td><input type="text" name="email"></td></tr>
            <tr><th>pass: </th><td><input type="password" name="password"></td></tr>
            <tr><th></th><td><input type="submit" name="send"></td></tr>
        </table>
    </form>

    <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>

@endsection
