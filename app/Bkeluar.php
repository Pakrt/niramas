<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bkeluar extends Model
{
    protected $fillable = ['barang_id', 'jumlah', 'keterangan', 'tanggal', 'user_id', 'spare', 'spares'];

    public function barang()
    {
        return  $this->belongsTo('App\Barang');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
