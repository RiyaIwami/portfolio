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

    public function editLog(Request $request, $id){
        $log = Log::find($id);

        $user = auth()->user();

        $log->user_id = $user->id; 
        $log->name = $request->input('name');
        $log->category_id = $request->input('category');
        $log->visit_status_id = $request->input('visit_status');
        $log->score_id = $request->input('score_id');
        $log->review = $request->input('review');

        if ($request->hasFile('image')) {
            $imagePath = $this->storeImage($request->file('image'));
            $log->image_paths = json_encode([$imagePath]);
        }

        $log->save();

        return redirect()->back()->with('status', 'ログを更新しました！');
    }
}

