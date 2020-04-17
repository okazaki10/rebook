<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_buku extends Model
{
    protected $table = 'detail_buku';
    protected $fillable = ['judul','tanggal_terbit','penulis','harga','gambar'];
    public $timestamps = false;
}
