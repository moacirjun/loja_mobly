<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Loja Teste Mobly - @yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <header></header>

    <div id="app">
        @yield('content')
    </div>

    <footer></footer>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>