<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Tahun_Ajaran extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'tb_tahun_ajaran';
    protected $primaryKey = 'id_tahun_ajaran';
    protected $fillable = [
        'id_tahun_ajaran','tahun_ajaran'
    ];


}