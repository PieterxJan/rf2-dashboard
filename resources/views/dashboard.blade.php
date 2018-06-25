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
            <h1>Dashboard</h1>
            <div class="text-left my-2 flex flex-row justify-between">
                <button
                    @click="fetching = ! fetching"
                    v-bind:class="{ 'bg-green border-green-dark': ! fetching, 'bg-red border-red-dark text-white': fetching, border: true, rounded: true, 'inline-block': true, 'p-2': true }">
                    <span v-if="fetching">Stop fetching</span>
                    <span v-if="! fetching">Start fetching</span>
                </button>
                <div class="flex items-center">
                    <div class="mr-2">Source:</div>
                    <select class="border w-48" v-model="source">
                        <option value="fake">Fake</option>
                        <option value="broadcast">SimHub</option>
                    </select>
                </div>
            </div>
            <div class="dashboard content flex-grow relative">
                <div class="bg-black opacity-75 absolute pin z-10" v-if="! fetching"></div>
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

                <rf2 position="3 / 1 / span 1 / span 1" property="NewData.OilTemperature"></rf2>
                <rf2 position="3 / 2 / span 1 / span 1" property="NewData.TCLevel"></rf2>
                <rf2 position="3 / 3 / span 1 / span 1" property="NewData.Gear"></rf2>
                <rf2 position="3 / 4 / span 1 / span 1" property="NewData.IsInPit"></rf2>
                <rf2 position="3 / 5 / span 1 / span 1" property="NewData.Throttle"></rf2>

                <rf2 position="4 / 1 / span 1 / span 1" property="NewData.BestLapOpponent.Name"></rf2>
                <rf2 position="4 / 2 / span 1 / span 1" property="NewData.BestLapOpponent.CarName"></rf2>
                <rf2 position="4 / 3 / span 1 / span 1" property="NewData.BestLapOpponent.CarClass"></rf2>
                <rf2 position="4 / 4 / span 1 / span 1" property="NewData.BestLapOpponent.BestLapTime"></rf2>
                <rf2 position="4 / 5 / span 1 / span 1" property="NewData.BestLapOpponent.Position"></rf2>

                <rf2 position="5 / 1 / span 1 / span 1" property="NewData.TyreWearFrontLeft"></rf2>
                <rf2 position="5 / 2 / span 1 / span 1" property="NewData.TyreWearFrontRight"></rf2>
                <rf2 position="5 / 3 / span 1 / span 1" property="NewData.TyreWearRearLeft"></rf2>
                <rf2 position="5 / 4 / span 1 / span 1" property="NewData.TyreWearRearRight"></rf2>
                <rf2 position="5 / 5 / span 1 / span 1" property="NewData.TyresWearAvg"></rf2>
            </div>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
