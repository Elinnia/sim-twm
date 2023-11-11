<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;



class Tb_User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    public $timestamps = false;
    public $incrementing = true;

    protected $table = 'tb_user';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id', 'user_email', 'user_password', 'user_conid', 'user_type', 'user_lastlogin'
    ];
    protected $hidden = ['user_password'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getAuthPassword()
    {
        return $this->user_password;
    }

   public function guru(){
     return $this->hasOne(Tb_Guru::class, 'nip', 'user_conid');
   }

}
