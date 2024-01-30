<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Category;
use App\Models\VisitStatus;
use App\Models\Score;

class LogsController extends Controller
{
    public function showLogs() {

        $logs = Log::all();
        return view('logs.logs', compact('logs'));
    }

    public function showLogDetail($id){
        $log = Log::find($id);
        return view('logs.detail', compact('log'));
    }

    public function showLogEditForm($id){
        $log = Log::find($id);
        $categories = Category::all();
        $visitStatuses = VisitStatus::all();
        return view('logs.edit_form', compact('log', 'categories', 'visitStatuses'));
    }
}
