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
        $user = Auth::user();

        $imageName = $this->saveImage($request->file('item-image'));

        $log = new Log();

        $log->user_id = $user->id;
        $log->name = $request->input('name');
        $log->category_id = $request->input('category');
        $log->visit_status_id = $request->input('visit_status');
        $log->score_id = $request->input('score');
        $log->review = $request->input('review');
        $log->image_file_name = $imageName;

        $log->save();

        return redirect()->back()
            ->with('status', 'ログを登録しました！');
    }

    /**
     * 商品画像をリサイズして保存します。
     *
     * @param UploadedFile $file アップロードされた商品画像
     *
     * @return string ファイル名
     */
    private function saveImage(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();

        Image::make($file)->fit(300, 300)->save($tempPath);

        $filePath = Storage::disk('public')->put('item-images', new File($tempPath));

        $imageName = basename($filePath);

        return $imageName;
    }

    /**
     * 一時的なファイルを生成してパスを返します。
     *
     * @return string ファイルパス
     */
    private function makeTempPath(): string
    {
        // 一時的なファイルを生成し、そのパスを返す
        $tmpFile = tmpfile();
        $meta = stream_get_meta_data($tmpFile);
        return $meta["uri"];
    }
}

