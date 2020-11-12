<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'kode' => 'unique:kategoris'
        ]);
        Kategori::create($request->all());
        return redirect('/kategori')->with('status', 'Data berhasil ditambahkan !!');
    }

    public function store(Request $request)
    {

    }

    public function show(Kategori $kategori)
    {

    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->update($request->all());
        return redirect('/kategori')->with('status', 'Data berhasil diupdate !!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori')->with('status', 'Data berhasil dihapus !!');
    }
}
