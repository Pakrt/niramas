@extends('layouts.master')
@section('tittle')
    Edit Data Satuan
@endsection
@section('content')
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-light" style="font-family: Verdana, Geneva, Tahoma, sans-serif">Data Satuan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right text-light">
                <li class="breadcrumb-item"><a href={{ url('/home')}} class="btn btn-danger btn-xs">Home</a></li>
                <li class="breadcrumb-item"><a href={{ url('/satuan')}} class="btn btn-danger btn-xs">Data Satuan</a></li>
                <li class="breadcrumb-item active">Edit Data Satuan</li>
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
            <div class="col-md-4 col-sm-12">
              <div class="card">
                <div class="card-body">
                    <form action="/satuan/{{$satuan->id}}/update" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-4">
                                <label>Kode Satuan</label>
                                <input type="text" name="kode" class="form-control" style="border-color: maroon" required value="{{$satuan->kode}}" disabled>
                            </div>
                            <div class="form-group col-8">
                                <label>Nama Satuan</label>
                                <input type="text" name="nama" class="form-control" style="border-color: maroon" required value="{{$satuan->nama}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" style="border-color: maroon" value="{{$satuan->keterangan}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/satuan') }}" class="btn btn-warning" onclick="return confirm('Yakin mau balik ??')">Kembali</a>
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
