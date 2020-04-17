<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_konfirmasi extends Model
{
    protected $table = 'status_konfirmasi';
    protected $fillable = ['id_penjual','id_user','id_keranjang','tanggal_mulai','tanggal_selesai','status'];
    public $timestamps = false;
}
