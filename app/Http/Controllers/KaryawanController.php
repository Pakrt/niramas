<?php

namespace App\Http\Controllers;

use App\User;
use App\Bagian;
use App\Karyawan;
use DB;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    public function create(Request $request)
    {
        $id = DB::table('karyawans')->max('id') + 1;
        $this->validate($request, [
            'email' => 'unique:users',
            'kontak' => 'unique:karyawans',
            'nik' => 'unique:karyawans'
        ]);
        $user = new \App\User;
        $user->role = $request->role;
        $user->name = $request->nama;
        $user->email = 'user'.$id.'@user.com';
        $user->password = bcrypt('inaco123');
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        $karyawan = Karyawan::create($request->all());
        return redirect('/karyawan')->with('status', 'User berhasil ditambahkan !!');
    }

    public function form()
    {
        $bagian = Bagian::all();
        return view ('karyawan.form', compact('bagian'));
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit($id)
    {
        $bagian = Bagian::all();
        $karyawan = Karyawan::find($id);
        return view('karyawan.edit', compact('karyawan'), compact('bagian'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        $user = $karyawan->user_id;
        $karyawan->update($request->all());
        return redirect("/user/$user/detail")->with('status', 'Data berhasil diupdate !!');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $user = User::find($karyawan->user_id);
        $karyawan->delete();
        $user->delete();
        return redirect('/karyawan')->with('status', 'Data berhasil dihapus !!');
    }
}
