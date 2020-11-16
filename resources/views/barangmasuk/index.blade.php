@extends('layouts.master')
@section('tittle')
    Mutasi Barang Masuk
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
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Mutasi Barang Masuk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item active">Mutasi Barang Masuk</li>
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
            <div class="col-8">
              <div class="card">
                <div class="card-header">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    @endif
                    <a href="{{url ('/bmasuk/form')}}" class="btn btn-secondary">Tambah Data</a>
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th width="150">TANGGAL</th>
                      <th width="100">KATEGORI</th>
                      <th>NAMA BARANG</th>
                      <th width="100">JUMLAH</th>
                      <th width="100">AKSI</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($bmasuk as $bmasuk)
                        <tr>
                            <td>{{$bmasuk->tanggal}}</td>
                            <td>{{$bmasuk->barang->kategori->kode}}</td>
                            <td>{{$bmasuk->barang->nama}}</td>
                            <td>{{$bmasuk->jumlah}}</td>
                            <td text-center>
                                <form action="/bmasuk/{{ $bmasuk->id }}/delete" method="POST">
                                    @method('delete')
                                    @csrf
                                    <a href="/bmasuk/{{ $bmasuk->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>&emsp;
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
@endsection
