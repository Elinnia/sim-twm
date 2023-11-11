<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Mapel extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    
    protected $table = 'tb_mapel';
    protected $primaryKey = 'kode_mapel';
    protected $fillable = [
        'kode_mapel','nip','kode_jurusan','kode_muatan','kode_submuatan','nama_mapel','kelas'
    ];

    public function guru(){
        return $this->hasOne(Tb_Guru::class, 'nip', 'nip');
    }
    public function jurusan(){
        return $this->hasOne(Tb_Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }
    public function muatan(){
        return $this->hasOne(Tb_Muatan_Akademik::class, 'kode_muatan', 'kode_muatan');
    }
    public function submuatan(){
        return $this->hasOne(Tb_Submuatan_Akademik::class, 'kode_submuatan', 'kode_submuatan');
    }
}