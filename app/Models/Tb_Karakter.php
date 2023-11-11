<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Karakter extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_catatan_perkembangan_karakter';
    protected $primaryKey = 'kode_catatan';
    protected $fillable = [
        'kode_catatan','kode_walikelas','nisn','kelas','kode_jurusan','id_tahun_ajaran','semester','catatan_perkembangan_karakter'
    ];

    public function siswa(){
        return $this->hasOne(Tb_Siswa::class, 'nisn', 'nisn');
    }
}