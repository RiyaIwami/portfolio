<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogsController extends Controller
{
    public function showLogs(Request $request) {
        return view('logs.logs');
    }
}
