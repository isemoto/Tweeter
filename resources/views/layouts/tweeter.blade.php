<html>
<head>
    <title>Hello/index</title>
    {{--    <link rel="stylesheet"--}}
    {{--          href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}

    <style>
        aa{color:#2fa360;}
        body{font-size:16pt; color:#999;}
        h1 { font-size:100pt; text-align:right; color:#f6f6f6;
            margin:-50px 0px -100px 0px;}
        ul{font-size:12px; }
        th{background-color:#999; color:fff; padding:5px 10px;}
        td{border: solid 1px #aaa; color:#999; padding:5px 10px;}
    </style>
</head>
<body>
<h1>@yield('title')</h1>
@section('menubar')
    <h2 class="menutitle">*メニュー</h2>
    <ul>
        <li>@show</li>
    </ul>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        @yield('footer')
    </div>
</body>
</html>
