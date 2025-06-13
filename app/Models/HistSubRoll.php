<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistSubRoll extends Model
{
    use HasFactory;

    public $table = 'hist_sub_roll';
    public $timestamps = false;
    public $guarded = [];
}
