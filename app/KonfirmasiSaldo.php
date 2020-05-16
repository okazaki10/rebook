<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonfirmasiSaldo extends Model
{
    protected $table = 'transaksi_saldo';
    protected $fillable = ['id_user','saldo','status','gambar'];
    public $timestamps = false;
}
