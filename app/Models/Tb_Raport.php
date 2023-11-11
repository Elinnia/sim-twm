<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Raport extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_raport';
    protected $primaryKey = 'raport_id';
    protected $guarded = [];

    public function siswa(){
        return $this->hasOne(Tb_Siswa::class, 'nisn', 'nisn');
    }

}