<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $fillable = ['kode', 'nama', 'keterangan', 'spare', 'spares'];

    public function barang()
    {
        return $this->hasMany('App\Barang');
    }
}
