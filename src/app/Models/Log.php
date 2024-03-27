<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'name', 
        'category_id', 
        'visit_status_id', 
        'score_id', 
        'review', 
        'image_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function visitStatus()
    {
        return $this->belongsTo(VisitStatus::class, 'visit_status_id');
    }

    public function score()
    {
        return $this->belongsTo(Score::class, 'score_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}



