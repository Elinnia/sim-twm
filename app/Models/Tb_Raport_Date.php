<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tb_Raport_Date extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $table = 'tb_raport_date';
    protected $primaryKey = 'id';
    protected $fillable = [
        'raport_date'
    ];
}