<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang_belanja extends Model
{
    protected $table = 'keranjang_belanja';
    protected $fillable = ['id_user','id_penjual','id_list_buku','jumlah','harga','status'];
    public $timestamps = false;
}
