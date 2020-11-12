<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['nik', 'user_id', 'bagian_id', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'kontak', 'avatar', 'spare', 'spares'];

    public function bagian()
    {
        return $this->belongsTo('App\Bagian');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/users/nouser.jpg');
        }
        return asset('images/users/'. $this->avatar);
    }
}
