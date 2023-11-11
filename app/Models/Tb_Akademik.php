<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Akademik extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'tb_akademik';
    protected $primaryKey = 'kode_akademik';
    protected $fillable = [
        'kode_akademik','kode_walikelas','nisn','kelas','id_tahun_ajaran','kode_jurusan','semester','keterangan'
    ];

     public function siswa(){
        return $this->hasOne(Tb_Siswa::class, 'nisn', 'nisn');
    }

}