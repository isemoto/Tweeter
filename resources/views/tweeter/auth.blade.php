@extends('layouts.tweeter')
<style>
    .pagination { font-size:10pt;}
    .pagination li { display:inline-block}
</style>


@section('title','Login')

@section('menubar')
    <br/>
@endsection

@section('content')
    <p>{{$message}}</p>
    <form action="/tweeter/auth" method="post">
        <table>
            @csrf
            <tr><th>mail: </th><td><input type="text" name="email"></td></tr>
            <tr><th>pass: </th><td><input type="password" name="password"></td></tr>
            <tr><th></th><td><input class="btn btn-primary" type="submit" name="send" value="login"></td></tr>
        </table>
    </form>

    @php
    $function =route('register');
    @endphp

    <button class="btn btn-primary" onclick="location.href='{{ $function }}'">登録</button>
{{--    <a class="nav-link" href="{{ route('register') }}">{{ __('登録') }}</a>--}}

@endsection

@section('footer')
    copyright 2020 group b.
@endsection
