<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Models\Log;
use App\Models\Category;
use App\Models\VisitStatus;
use App\Models\Score;
use App\Models\Image;
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
	
        $logs = Log::orderBy('updated_at', 'desc')->get();
        $categories = Category::orderBy('sort_no')->get();
        $scores = Score::all();
        $visitStatuses = VisitStatus::all();
        $log = new Log();

        return view('add', compact('categories', 'visitStatuses', 'scores', 'log'));
    }

     public function addLog(AddRequest $request)
    {
	$validator = $this->getValidationFactory()->make($request->all(), $request->rules());
        if ($validator->fails()) {
            Log::error($validator->errors());
     }
        $user = Auth::user();

        $log = Log::create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'category_id' => $request->input('category'),
            'visit_status_id' => $request->input('visit_status'),
            'score_id' => $request->input('score_id'),
            'review' => $request->input('review'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('log_images', 'public');
                $imageModel = $log->images()->create(['path' => $path]);
                $imageModel->log_id = $log->id;
                $imageModel->save();
            }
        }

        $log->load('images');

        foreach ($log->images as $image) {
            Image::create([
                'log_id' => $log->id,
                'path' => $image->path,
            ]);
        }

        $request->session()->flash('status', 'ログを登録しました！');

        $logs = Log::orderBy('updated_at', 'desc')->get();
        $categories = Category::orderBy('sort_no')->get();
        $scores = Score::all();
        $visitStatuses = VisitStatus::all();
        $log = new Log();

        return view('add', compact('categories', 'visitStatuses', 'scores', 'log'));
    }
}

