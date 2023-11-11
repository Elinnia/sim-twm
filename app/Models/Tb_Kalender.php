<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Kalender extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_kalender';
    protected $primaryKey = 'kalender_id';
    protected $fillable = [
        'kalender_id','kalender_date','kalender_deskripsi','id_tahun_ajaran'
    ];

    public function tahun_ajar(){
        return $this->hasOne(Tb_Tahun_Ajaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
    }

}