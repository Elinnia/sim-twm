<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Nilai extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_nilai_akademik';
    protected $primaryKey = 'kode_nilai';
    protected $fillable = [
        'kode_nilai','kode_walikelas','nip','id_tahun_ajaran','kelas','kode_jurusan','semester','nisn','kode_mapel','kkm','nilai_tugas','nilai_uts','nilai_uas','nilai_pengetahuan','nilai_keterampilan','nilai_akhir','predikat'
    ];

    public function getNilaiPengetahuanAttribute($value){
        $n = $value;
        if(strtolower($n)=="nan"){
            $n = 0;
        }
        return $n;
    }

    public function getNilaiTugasAttribute($value){
        $n = $value;
        if(strtolower($n)=="nan"){
            $n = 0;
        }
        return $n;
    }

    public function getNilaiUtsAttribute($value){
        $n = $value;
        if(strtolower($n)=="nan"){
            $n = 0;
        }
        return $n;
    }

    public function getNilaiUasAttribute($value){
        $n = $value;
        if(strtolower($n)=="nan"){
            $n = 0;
        }
        return $n;
    }

    public function getNilaiKeterampilanAttribute($value){
        $n = $value;
        if(strtolower($n)=="nan"){
            $n = 0;
        }
        return $n;
    }

    public function getNilaiAkhirAttribute($value){
        $n = $value;
        if(strtolower($n)=="nan"){
            $n = 0;
        }
        return $n;
    }

    public function siswa(){
        return $this->hasOne(Tb_Siswa::class, 'nisn', 'nisn');
    }

     public function mapel(){
        return $this->hasOne(Tb_Mapel::class, 'kode_mapel', 'kode_mapel');
    }

}