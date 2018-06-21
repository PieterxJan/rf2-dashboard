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
        <div class="mx-auto w-full max-w-xl mt-10" id="app">
            <div class="flex h-screen items-center justify-center">
                <h1>Pushed.</h1>
            </div>
        </div>
    </body>
</html>
