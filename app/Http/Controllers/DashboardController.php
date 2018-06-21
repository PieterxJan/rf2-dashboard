<?php

namespace App\Http\Controllers;

use App\Events\TestPush;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function push($msg)
    {
        event(new TestPush($msg));

        return view('push');
    }
}
