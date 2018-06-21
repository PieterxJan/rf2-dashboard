<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="font-mono">
        <div class="mx-auto w-full max-w-xl mt-10">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
