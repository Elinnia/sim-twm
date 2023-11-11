<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Deskripsi_Karakter extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_deskripsi_perkembangan_karakter';
    protected $primaryKey = 'kode_deskripsi';
    protected $fillable = [
        'kode_deskripsi','kode_walikelas','nisn','integritas','religius','nasionalis','mandiri','gotong_royong','kelas','kode_jurusan','id_tahun_ajaran','semester'
    ];

    public function siswa(){
        return $this->hasOne(Tb_Siswa::class, 'nisn', 'nisn');
    }

}