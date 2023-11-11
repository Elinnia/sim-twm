<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Kehadiran extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'tb_kehadiran';
    protected $primaryKey = 'kode_kehadiran';
    protected $fillable = [
        'kode_kehadiran','kode_walikelas','nisn','kelas','id_tahun_ajaran','kode_jurusan','semester','sakit','izin','tanpa_keterangan'
    ];

    public function siswa(){
        return $this->hasOne(Tb_Siswa::class, 'nisn', 'nisn');
    }

}