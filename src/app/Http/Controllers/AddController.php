<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\VisitStatus;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class AddController extends Controller
{
    public function showAddForm()
    {
        $categories = Category::orderBy('sort_no')->get();

        $visitStatuses = VisitStatus::orderBy('id')->get();

        $scores = Score::orderBy('id')->get();

        return view('add', ['categories' => $categories, 'visitStatuses' => $visitStatuses, 'scores' => $scores]);
    }

    public function addLog(AddRequest $request)
    {
        $user = Auth::user();

        $log = new Log();

        $log->user_id = $user->id;
        $log->name = $request->input('name');
        $log->category_id = $request->input('category');
        $log->visit_status_id = $request->input('visit_status');
        $log->score_id = $request->input('score');
        $log->review = $request->input('review');

        $log->save();

        return redirect()->back()
            ->with('status', 'ログを追加しました！');
    }
}
