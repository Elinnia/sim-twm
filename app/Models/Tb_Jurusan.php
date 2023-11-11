<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Jurusan extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_jurusan';
    protected $primaryKey = 'kode_jurusan';
    protected $fillable = [
        'kode_jurusan ','nama_jurusan'
    ];
}