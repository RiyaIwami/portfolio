<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Models\Log;
use App\Models\Category;
use App\Models\VisitStatus;
use App\Models\Score;
use Facade\Ignition\Middleware\AddLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddController extends Controller
{
    /**
     * Display the log addition form.
     *
     * @return \Illuminate\View\View
     */
    public function showAddForm()
    {
        $categories = Category::orderBy('sort_no')->get();
        $scores = Score::all();
        $visitStatuses = VisitStatus::all();
        $log = new Log();

        return view('add', compact('categories', 'visitStatuses', 'scores', 'log'));

    }

    /**
     * Add a log.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLog(AddRequest $request)
    {
        $user = Auth::user();

        $log = new Log();

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

        return redirect()->back()->with('status', 'ログを登録しました！');
    }
}

