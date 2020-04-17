<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    protected $table = 'user';
    protected $fillable = ['password','email','nama_lengkap','alamat','tanggal_lahir','no_hp','saldo','status','foto_profil'];
    public $timestamps = false;
}
