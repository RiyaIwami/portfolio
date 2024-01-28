<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    // ユーザーリレーション
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
    // カテゴリーリレーション
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // 訪問ステータスリレーション
    public function visitStatus()
    {
        return $this->belongsTo(VisitStatus::class, 'visit_status_id');
    }

    // スコアリレーション
    public function score()
    {
        return $this->belongsTo(Score::class, 'score_id');
    }

    // 他のリレーションもあればここに追加する
}


