<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitStatus extends Model
{
    protected $table = 'visit_statuses';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['visit_status'];
}


