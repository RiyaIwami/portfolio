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
        $visitStatuses = VisitStatus::orderBy('id')->get();
        $scores = Score::orderBy('id')->get();

        return view('add', ['categories' => $categories, 'visitStatuses' => $visitStatuses, 'scores' => $scores]);
    }

    /**
     * ログを追加します。
     *
     * @param AddRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLog(AddRequest $request)
    {
        // ログを追加する際にユーザー情報を取得
        $user = Auth::user();

        // 商品画像の保存処理を行い、保存されたファイル名を取得
        $imageName = $this->saveImage($request->file('item-image'));

        // 新しいログモデルを作成し、リクエストから取得したデータを設定
        $log = new Log();
        $log->user_id = $user->id;
        $log->name = $request->input('name');
        $log->category_id = $request->input('category');
        $log->visit_status_id = $request->input('visit_status');
        $log->score_id = $request->input('score');
        $log->review = $request->input('review');
        $log->image_file_name = $imageName;

        // ログを保存
        $log->save();

         // ログが登録されたら元のページにリダイレクトして成功メッセージを表示
        return redirect()->back()->with('status', 'ログを登録しました！');
    }

}
