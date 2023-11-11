<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Muatan_Akademik extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_muatan_akademik';
    protected $primaryKey = 'kode_muatan';
    protected $fillable = [
        'kode_muatan','keterangan'
    ];
}