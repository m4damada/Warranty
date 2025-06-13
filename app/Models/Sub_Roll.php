<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Roll extends Model
{
    use HasFactory;

    public $table = 'sub_rolls';
    public $timestamps = false;
    public $guarded = [];
    
    public function m_roll()
    {
        return $this->belongsTo(M_Roll::class,'id_m_roll','id');
    }
}
