<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // ログとの関連付けを定義
    public function logs()
    {
        return $this->hasMany(Log::class, 'category_id');
    }
}