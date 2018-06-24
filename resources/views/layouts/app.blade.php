<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="font-mono">
        <div class="h-screen w-full flex flex-col" id="app">
            @yield('content')
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
