<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Roll extends Model
{
    use HasFactory;

    public $table = 'm_rolls';
    public $timestamps = false;
    public $guarded = [];
    
    public function produk()
    {
        return $this->belongsTo(ProgramStudi::class,'id_produk','id');
    }
}
