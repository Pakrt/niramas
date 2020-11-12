<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'kategori_id', 'jumlah', 'spesifikasi', 'minim', 'gambar', 'satuan_id', 'spare', 'spares'];

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }

    public function satuan()
    {
        return $this->belongsTo('App\Satuan');
    }
}
