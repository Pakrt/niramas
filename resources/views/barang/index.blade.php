@extends('layouts.master')
@section('tittle')
    Data Barang
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
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Data Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href="/home" class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href="/home" class="btn btn-danger btn-xs">Master</a></li>
                <li class="breadcrumb-item active">Master Barang</li>
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
            <div class="col-10">
              <div class="card">
                <div class="card-header">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    @endif
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                        Tambah Data
                    </button>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th width="20">#</th>
                      <th width="100">KATEGORI</th>
                      <th>NAMA BARANG</th>
                      <th width="50">JUMLAH</th>
                      <th width="100">MINIM STOK</th>
                      <th width="50">SATUAN</th>
                      <th>SPESIFIKASI</th>
                      <th width="100">AKSI</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($barang as $barang)
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{$barang->kategori->kode}}</td>
                            <td>{{$barang->nama}}</td>
                            <td>{{$barang->jumlah}}</td>
                            <td>{{$barang->minim}}</td>
                            <td>{{$barang->satuan->kode}}</td>
                            <td>{{$barang->spesifikasi}}</td>
                            <td text-center>
                                <form action="/barang/{{ $barang->id }}/delete" method="POST">
                                    @method('delete')
                                    @csrf
                                    <a href="/barang/{{ $barang->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>&emsp;
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus datanya niiih ??')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
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
      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: maroon; color:white ">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="/barang/create" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori_id" style="border-color: maroon" required>
                            @foreach ($kategori as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->kode}} - {{$kategori->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama" class="form-control" style="border-color: maroon" required>
                    </div>
                    <div class="form-group" hidden>
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" style="border-color: maroon" value="0">
                    </div>
                    <div class="form-group">
                        <label>Spesifikasi</label>
                        <input type="text" name="spesifikasi" class="form-control" style="border-color: maroon">
                    </div>
                    <div class="form-group">
                        <label>Minimum Stok</label>
                        <input type="number" name="minim" class="form-control" style="border-color: maroon">
                    </div>
                    {{-- <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" style="border-color: maroon">
                    </div> --}}
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control" name="satuan_id" style="border-color: maroon" required>
                            @foreach ($satuan as $satuan)
                            <option value="{{$satuan->id}}">{{$satuan->kode}} - {{$satuan->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-success">Tambah Data</button>
                </div>
            </form>
            </div>
            </div>
        </div>
@endsection
