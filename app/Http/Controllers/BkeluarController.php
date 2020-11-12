<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Bkeluar;
use Illuminate\Http\Request;

class BkeluarController extends Controller
{
    public function index()
    {
        $bkeluar = Bkeluar::all();
        return view('barangkeluar.index', compact('bkeluar'));
    }

    public function create(Request $request)
    {
        Bkeluar::create($request->all());
        $bkeluar = Barang::findOrFail($request->barang_id);
        $bkeluar->jumlah -= $request->jumlah;
        $bkeluar->save();
        return redirect('/bkeluar')->with('status', 'Data berhasil dikurangi !!');
    }

    public function form (Request $request)
    {
        $barang = Barang::all();
        return view('barangkeluar.form', compact('barang'));
    }

    public function show(bkeluar $bkeluar)
    {

    }

    public function edit($id)
    {
        $bkeluar = Bkeluar::find($id);
        return view('barangkeluar.edit', compact('bkeluar'));
    }

    public function update(Request $request, $id)
    {
        $bkeluar = Bkeluar::find($id);
        $bkeluar->update($request->all());
        return redirect('/bkeluar')->with('status', 'Data berhasil diupdate !!');
    }

    public function destroy($id)
    {
        $bkeluar = Bkeluar::find($id);
        $bkeluar->delete();
        return redirect('/bkeluar')->with('status', 'Data berhasil dihapus !!');
    }
}
