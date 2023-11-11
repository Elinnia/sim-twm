<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Walikelas extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_walikelas';
    protected $primaryKey = 'kode_walikelas';
    protected $fillable = [
        'kode_walikelas','nip','kode_jurusan','kelas','id_tahun_ajaran'
    ];

    public function jurusan(){
        return $this->hasOne(Tb_Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }

    public function guru(){
        return $this->hasOne(Tb_Guru::class, 'nip', 'nip');
    }

     public function tahun_ajar(){
        return $this->hasOne(Tb_Tahun_Ajaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
    }

    public function siswa(){
        return $this->hasOne(Tb_Siswa::class,'nisn','nisn');
    }
}