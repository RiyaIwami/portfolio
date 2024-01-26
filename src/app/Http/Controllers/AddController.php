<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRequest;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\VisitStatus;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AddController extends Controller
{
    /**
     * ログ追加フォームを表示します。
 *
 * @return \Illuminate\View\View
 */
    public function showAddForm()
    {
        $categories = Category::orderBy('sort_no')->get();
        $scores = Score::orderBy('sort_no')->get();
        $visitStatuses =VisitStatus::all();

    return view('add', compact('categories', 'visitStatuses', 'scores'));
    }

    /**
     * ログを追加します。
     *
     * @param AddRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLog(Request $request)
    {

        // ログを追加する際にユーザー情報を取得
        $user = Auth::user();

        $log = new Log();

        // ログの各フィールドに値をセット
        $log->user_id = $user->id;
        $log->name = $request->input('name');
        $log->category_id = $request->input('category');
        $log->visit_status_id = $request->input('visit_status');
        $log->score_id = $request->input('score');
        $log->review = $request->input('review');
    
        // 画像の処理
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $log->image_paths = json_encode([$imagePath]);
        }
    
        // ログを保存
        $log->save();
    
        // ログが登録されたら元のページにリダイレクトして成功メッセージを表示
        return redirect()->back()->with('status', 'ログを登録しました！');
    }
}
