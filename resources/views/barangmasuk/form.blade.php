@extends('layouts.master')
@section('tittle')
    Form Barang Masuk
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Form Barang Masuk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Form</a></li>
                <li class="breadcrumb-item active">Form Barang Masuk</li>
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
            <div class="col-md-5 col-sm-12">
              <div class="card">
                <div class="card-body">
                    <form action="/bmasuk/create" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label>Barang</label>
                                <select style="border-color: maroon" class="form-control select2bs4" name="barang_id"  required>
                                    @foreach ($barang as $barang)
                                    <option value="{{$barang->id}}">{{$barang->kategori->kode}} - {{$barang->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" style="border-color: maroon">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" style="border-color: maroon">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-8">
                                <label>Keterangan</label>
                                <textarea type="text" name="keterangan" class="form-control" style="border-color: maroon"></textarea>
                            </div>
                            <div class="form-group" hidden>
                                <label>PIC</label>
                                <input type="text" name="user_id" class="form-control" style="border-color: maroon" value="{{ Auth::user()->id}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/bmasuk') }}" class="btn btn-warning" onclick="return confirm('Yakin mau balik ??')">Kembali</a>
                            <button type="submit" class="btn btn-success" onclick="return confirm('Anda akan menambahkan barang tersebut !!')">Simpan Data</button>
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
