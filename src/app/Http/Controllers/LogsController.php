<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LogsController extends Controller
{
    public function showLogs() {
        return view('logs.logs');
    }
}
