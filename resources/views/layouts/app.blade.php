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
            <h1>@yield('title')</h1>
            <div class="text-left my-2">
                <button
                    @click="fetching = ! fetching"
                    v-bind:class="{ 'bg-green border-green-dark': ! fetching, 'bg-red border-red-dark text-white': fetching, border: true, rounded: true, 'inline-block': true, 'p-2': true }">
                    <span v-if="fetching">Stop fetching</span>
                    <span v-if="! fetching">Start fetching</span>
                </button>
            </div>
            <div class="dashboard content flex-grow">
                <rf2 position="1 / 1 / span 1 / span 1" property="NewData.SessionTimeLeft"></rf2>
                <rf2 position="1 / 2 / span 1 / span 1" property="NewData.OpponentsCount"></rf2>
                <rf2 position="1 / 3 / span 1 / span 1" property="NewData.CarModel"></rf2>
                <rf2 position="1 / 4 / span 1 / span 1" property="NewData.CurrentLap"></rf2>
                <rf2 position="1 / 5 / span 1 / span 1" property="NewData.CarClass"></rf2>
                <rf2 position="2 / 1 / span 1 / span 1" property="NewData.CurrentLapTime"></rf2>
                <rf2 position="2 / 2 / span 1 / span 1" property="NewData.FilteredSpeedKmh"></rf2>
                <rf2 position="2 / 3 / span 1 / span 1" property="NewData.Fuel"></rf2>
                <rf2 position="2 / 4 / span 1 / span 1" property="NewData.PitLimiterOn"></rf2>
                <rf2 position="2 / 5 / span 1 / span 1" property="NewData.TrackName"></rf2>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
