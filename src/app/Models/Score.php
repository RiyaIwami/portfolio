<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['score'];
}