<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Merek extends Model
{
    use HasFactory;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $table = 'mereks'; // pastikan nama tabel benar
    protected $primaryKey = 'id'; // defaultnya sudah 'id'
    public $incrementing = true;
    protected $keyType = 'int';
    protected $guarded = [];
}