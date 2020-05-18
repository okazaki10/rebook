<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeranjangSewa extends Model
{
    protected $table = 'keranjang_sewa';
    protected $fillable = ['id_user','id_penjual','id_list_buku','jumlah','harga','status'];
    public $timestamps = false;
}
