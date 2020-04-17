<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';
    protected $fillable = ['id_user','id_penjual','chat','tanggal'];
    public $timestamps = false;
}
