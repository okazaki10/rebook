<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiSaldo extends Model
{
    protected $table = 'transaksi_saldo';
    protected $fillable = ['id_user','saldo','tanggal','status','gambar'];
    public $timestamps = false;
}
