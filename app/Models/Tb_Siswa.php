<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_Siswa extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'tb_siswa';
    protected $primaryKey = 'nisn';
    protected $fillable = [
        'nisn','nama_peserta_didik', 'tempat_tanggal_lahir','jenis_kelamin','agama','status_dalam_keluarga','anak_ke','alamat_peserta_didik','nomor_telepon_rumah','asal_sekolah','alamat_sekolah_asal','diterima_di_sekolah_ini','di_kelas','kode_jurusan','pada_tanggal','pekerjaan_orang_tua_ibu','pekerjaan_orang_tua_ayah','nama_orang_tua_ayah','alamat_orang_tua_ayah','nama_orang_tua_ibu','alamat_orang_tua_ibu','nama_wali_peserta_didik','alamat_wali_peserta_didik','nomor_telepon','pekerjaan_wali_peserta_didik','photo'
        ,'status_siswa'
    ];

    public function jurusan(){
        return $this->hasOne(Tb_Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }

    public function raport(){
        return $this->hasOne(Tb_Raport::class, 'nisn', 'nisn');
    }

     public function nilai(){
        return $this->hasOne(Tb_Nilai::class, 'nisn', 'nisn');
    }

}