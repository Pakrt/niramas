<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $fillable = ['kode', 'nama', 'spare', 'spares'];

    public function karyawan()
    {
        return $this->hasOne('App\Karyawan');
    }
}
