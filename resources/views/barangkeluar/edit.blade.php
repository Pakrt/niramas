@extends('layouts.master')
@section('tittle')
    Edit Mutasi Barang Keluar
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Mutasi Barang Keluar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href="/bkeluar" class="btn btn-danger btn-xs">Mutasi Barang Keluar</a></li>
                <li class="breadcrumb-item active">Edit Mutasi Barang Keluar</li>
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
                    <form action="/bkeluar/{{$bkeluar->id}}/update" method="POST">
                        @csrf
                        <div class="form-group col-md-8">
                            <label>Barang</label>
                            <select style="border-color: maroon" class="form-control select2bs4" name="barang_id"  required disabled>
                                <option value="{{$bkeluar->barang->id}}">{{$bkeluar->barang->kategori->kode}} - {{$bkeluar->barang->nama}}</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" style="border-color: maroon" value="{{$bkeluar->jumlah}}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" style="border-color: maroon" required value="{{$bkeluar->tanggal}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control" style="border-color: maroon">{{$bkeluar->keterangan}}</textarea>
                        </div>
                        <div class="form-group" hidden>
                            <label>PIC</label>
                            <input type="text" name="user_id" class="form-control" style="border-color: maroon" value="{{ Auth::user()->id}}">
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/bkeluar') }}" class="btn btn-warning" onclick="return confirm('Yakin mau balik ??')">Kembali</a>
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
