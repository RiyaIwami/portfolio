<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogsController extends Controller
{
    public function showLogs() {

        $logs = Log::get();
        return view('logs.logs', ['logs' => $logs]);
    }
}
