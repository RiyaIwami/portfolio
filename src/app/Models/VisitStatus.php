<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitStatus extends Model
{
    public function logs()
    {
        return $this->hasMany(Log::class, 'visit_status_id');
    }
}


