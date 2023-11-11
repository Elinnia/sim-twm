<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Kenaikan extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_kenaikan_kelas';
    protected $primaryKey = 'kode_kenaikan_kelas';
    protected $guarded = [
      
    ];
}