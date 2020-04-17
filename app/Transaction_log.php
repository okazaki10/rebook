<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_log extends Model
{
    protected $table = 'transaction_log';
    protected $fillable = ['id_status_konfirmasi','tanggal_selesai'];
    public $timestamps = false;
}
