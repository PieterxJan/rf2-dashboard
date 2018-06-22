@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div><a href="/api/user">Api user</a></div>

    <div>
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>

@endsection