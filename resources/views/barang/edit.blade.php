@extends('layouts.master')
@section('tittle')
    Edit Data Barang
@endsection
<?php
    $satuan = DB::select('select * from satuans');
?>
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Edit Data Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href={{ url('/barang')}} class="btn btn-danger btn-xs">Data Barang</a></li>
                <li class="breadcrumb-item active">Edit Data Barang</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <div class="card">
                <div class="card-body">
                    <form action="/barang/{{$barang->id}}/update" method="POST">
                        @csrf
                        <div class="form-group col-md-6">
                            <label>Kategori</label>
                            <select class="form-control select2bs4" name="kategori_id" style="border-color: maroon" required>
                                <option value="{{$barang->kategori_id}}">{{$barang->kategori->kode}} - {{$barang->kategori->nama}}</option>
                                @foreach ($kategori as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->kode}} - {{$kategori->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label>Nama Barang</label>
                            <input type="text" name="nama" class="form-control" style="border-color: maroon" required value="{{$barang->nama}}">
                        </div>
                        <div class="form-group" hidden>
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" style="border-color: maroon" value="0">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Minim Stok</label>
                                <input type="number" name="minim" class="form-control" style="border-color: maroon" value="{{$barang->minim}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Satuan</label>
                                <select class="form-control select2bs4" name="satuan_id" style="border-color: maroon" required>
                                    <option value="{{$barang->satuan_id}}">{{$barang->satuan->kode}} - {{$barang->satuan->nama}}</option>
                                    @foreach ($satuan as $satuan)
                                    <option value="{{$satuan->id}}">{{$satuan->kode}} - {{$satuan->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-8">
                            <label>Spesifikasi</label>
                            <input type="text" name="spesifikasi" class="form-control" style="border-color: maroon" value="{{$barang->spesifikasi}}">
                        </div>
                        {{-- <div class="form-group col-md-6">
                            <label>Gambar</label>
                            <input type="file" class="form-control" style="border-color: maroon">
                        </div> --}}
                        <div class="modal-footer">
                            <a href="{{ url('/barang') }}" class="btn btn-warning" onclick="return confirm('Yakin mau balik ??')">Kembali</a>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Udah selesai update nya ??')">Update Data</button>
                        </div>
                    </form>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
