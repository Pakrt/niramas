<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuan = Satuan::all();
        return view('satuan.index', compact('satuan'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'kode' => 'unique:satuans'
        ]);
        Satuan::create($request->all());
        return redirect('/satuan')->with('status', 'Data berhasil ditambahkan !!');
    }

    public function store(Request $request)
    {

    }

    public function show(satuan $satuan)
    {

    }

    public function edit($id)
    {
        $satuan = Satuan::find($id);
        return view('satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $satuan = Satuan::find($id);
        $satuan->update($request->all());
        return redirect('/satuan')->with('status', 'Data berhasil diupdate !!');
    }

    public function destroy($id)
    {
        $satuan = Satuan::find($id);
        $satuan->delete();
        return redirect('/satuan')->with('status', 'Data berhasil dihapus !!');
    }
}
