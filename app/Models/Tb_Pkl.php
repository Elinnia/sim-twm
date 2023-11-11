<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Pkl extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_pkl';
    protected $primaryKey = 'kode_pkl';
    protected $fillable = [
        'kode_pkl','kode_walikelas','nisn','kelas','id_tahun_ajaran','kode_jurusan','semester','mitra_dudi','lokasi','masa_bulan','keterangan'
    ];

    public function siswa(){
        return $this->hasOne(Tb_Siswa::class, 'nisn', 'nisn');
    }

}