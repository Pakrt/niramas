<?php

namespace App\Http\Controllers;

use App\Bagian;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    public function index()
    {
        $bagian = Bagian::all();
        return view('bagian.index', compact('bagian'));
    }

    public function create(Request $request)
    {
        Bagian::create($request->all());
        return redirect('/bagian')->with('status', 'Data berhasil ditambahkan !!');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Bagian $bagian)
    {
        //
    }

    public function edit($id)
    {
        $bagian = Bagian::find($id);
        return view('bagian.edit', compact('bagian'));
    }

    public function update(Request $request, $id)
    {
        $bagian = Bagian::find($id);
        $bagian->update($request->all());
        return redirect('/bagian')->with('status', 'Data berhasili diupdate !!');
    }

    public function destroy($id)
    {
        $bagian = Bagian::find($id);
        $bagian->delete();
        return redirect('/bagian')->with('status', 'Data berhasili dihapus !!');
    }
}
