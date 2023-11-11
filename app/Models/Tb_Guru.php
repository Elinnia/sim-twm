<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Guru extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'tb_guru';
    protected $primaryKey = 'nip';
    protected $fillable = [
        'nip','nama_guru','nama_pendidik_dan_tenaga_kependidikan','kode_guru','jabatan','tempat_tanggal_lahir','no_nuptk','no_sk_pengangkatan','tanggal_sk_pengangkatan','pekerjaan','riwayat_pendidikan','pendidikan_terakhir','no_tlp_rumah','no_hp','alamat_email','alamat_rumah_sesuai_ktp','alamat_rumah_saat_ini','nama_ibu_kandung','status','nama_suami_istri','jumlah_anak','photo'
    ];
}