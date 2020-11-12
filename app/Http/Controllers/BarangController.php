<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $barang = Barang::all();
        return view('barang.index', compact('barang', 'kategori'));
    }

    public function create(Request $request)
    {
        Barang::create($request->all());
        return redirect('/barang')->with('status', 'Data berhasil dimasukkan!!');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->update($request->all());
        return redirect('/barang')->with('status', 'Data berhasil diupdate !!');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('status', 'Data berhasil dihapus !!');
    }
}
