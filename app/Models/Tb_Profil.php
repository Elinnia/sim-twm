<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Profil extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_profil';
    protected $primaryKey = 'npsn';
    protected $fillable = [
        'nama_sekolah','npsn','nis_nss_nds','alamat_sekolah','kelurahan','kecamatan','kabupaten_kota','provinsi','website','email'
    ];
}