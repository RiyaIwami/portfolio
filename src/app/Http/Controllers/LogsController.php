<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Category;
use App\Models\VisitStatus;
use App\Models\Score;

class LogsController extends Controller
{
    public function showLogs()
    {
        $logs = Log::with('images')->get();
        // dd($logs->toArray());
        return view('logs.logs', compact('logs'));
    }

    public function showLogDetail($id)
    {
        $log = Log::with('images')->find($id); 
        return view('logs.detail', compact('log'));
    }

    public function showLogEditForm($id)
    {
        $log = Log::find($id);
        $categories = Category::all();
        $visitStatuses = VisitStatus::all();
        // dd($log->toArray());
        return view('logs.edit_form', compact('log', 'categories', 'visitStatuses'));
    }

    public function editLog(Request $request, $id)
    {
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

    public function deleteLog($id)
    {
        $log = Log::destroy($id);
        return redirect()->route('top');
    }

    public function showSearchLogs()
    {
        $categories = Category::orderBy('sort_no')->get();
        $scores = Score::all();
        $visitStatuses = VisitStatus::all();
        return view('logs.search', compact('categories', 'visitStatuses', 'scores'));
    }

    public function search(Request $request)
    {
        $category = $request->input('category');
        $visitStatus = $request->input('visit_status');
        $score = $request->input('score_id');

        $logs = Log::when($category, function ($query) use ($category) {
            return $query->where('category_id', $category);
        })
        ->when($visitStatus, function ($query) use ($visitStatus) {
            return $query->where('visit_status_id', $visitStatus);
        })
        ->when($score, function ($query) use ($score) {
            return $query->where('score_id', $score);
        })
        ->get();

        return view('logs.search_results', compact('logs'));
    }
}
