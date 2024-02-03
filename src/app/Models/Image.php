<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Log;

class Image extends Model
{
    protected $fillable = ['log_id', 'path'];

    public function log()
    {
        return $this->belongsTo(Log::class);
    }
}