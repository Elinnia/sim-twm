<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Ekstrakurikuler extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'tb_ekstrakurikuler';
    protected $primaryKey = 'kode_ekstrakurikuler';
    protected $fillable = [
        'kode_ekstrakurikuler','kode_walikelas','nisn','kelas','id_tahun_ajaran','kode_jurusan','semester','kegiatan_ekstrakurikuler','keterangan'
    ];

    public function siswa(){
        return $this->hasOne(Tb_Siswa::class, 'nisn', 'nisn');
    }
}