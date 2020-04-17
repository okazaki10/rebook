<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_buku extends Model
{
    protected $table = 'list_buku';
    protected $fillable = ['id_penjual','id_buku','stok'];
    public $timestamps = false;
}
