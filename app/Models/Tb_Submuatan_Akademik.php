<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Submuatan_Akademik extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_submuatan_akademik';
    protected $primaryKey = 'kode_submuatan';
    protected $fillable = [
        'kode_submuatan','kode_muatan','keterangan'
    ];
}