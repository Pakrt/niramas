<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Bmasuk;
use Illuminate\Http\Request;

class BmasukController extends Controller
{
    public function index()
    {
        $bmasuk = Bmasuk::all();
        return view('barangmasuk.index', compact('bmasuk'));
    }

    public function create(Request $request)
    {
        Bmasuk::create($request->all());
        $bmasuk = Barang::findOrFail($request->barang_id);
        $bmasuk->jumlah += $request->jumlah;
        $bmasuk->save();
        return redirect('/bmasuk')->with('status', 'Data berhasil ditambahkan !!');
    }

    public function form (Request $request)
    {
        $barang = Barang::all();
        return view('barangmasuk.form', compact('barang'));
    }

    public function show(Bmasuk $bmasuk)
    {

    }

    public function edit($id)
    {
        $bmasuk = Bmasuk::find($id);
        return view('barangmasuk.edit', compact('bmasuk'));
    }

    public function update(Request $request, $id)
    {
        $bmasuk = Bmasuk::find($id);
        $bmasuk->update($request->all());
        return redirect('/bmasuk')->with('status', 'Data berhasil diupdate !!');
    }

    public function destroy($id)
    {
        $bmasuk = Bmasuk::find($id);
        $bmasuk->delete();
        return redirect('/bmasuk')->with('status', 'Data berhasil dihapus !!');
    }
}
